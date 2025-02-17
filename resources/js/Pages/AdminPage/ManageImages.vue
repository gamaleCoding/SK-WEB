<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { onMounted, ref, watch } from 'vue';
import { notification, Modal } from 'ant-design-vue';
import { UploadOutlined, DeleteOutlined, EditOutlined, ExclamationCircleOutlined } from '@ant-design/icons-vue';
import axios from 'axios';
import { Head } from '@inertiajs/vue3';
import { createVNode } from 'vue';
import UpdateImageModal from '@/Components/UpdateImageModal.vue';

const activeKey = ref('1');
const fileList = ref([]);
const images = ref([]);
const updateModalOpen = ref(false);
const selectedImage = ref(null);
const searchValue = ref("");
const dateValue = ref(null);

const beforeUpload = () => false;

// Upload images function
const handleUpload = async () => {
    if (fileList.value.length === 0) {
        notification.warning({ description: 'No files selected' });
        return;
    }

    const formData = new FormData();
    fileList.value.forEach(file => {
        formData.append('files[]', file.originFileObj);
    });

    try {
        const response = await axios.post(route('upload_images'), formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        if (response.data.success) {
            notification.success({ description: response.data.message });
            fileList.value = [];
            await fetchImages();
        } else {
            notification.error({ description: response.data.message });
        }
    } catch (error) {
        console.error('Upload failed', error);
        notification.error({ description: 'Invalid image extension or upload error' });
    }
};

// Fetch Images function
const fetchImages = async () => {
    try {
        const response = await axios.get(route('display_images'));
        if (response.data.success) {
            images.value = response.data.images;
        }
    } catch (error) {
        console.error('Fetching images failed', error);
    }
};
onMounted(fetchImages);

// Delete function
const deleteImage = async (imageId) => {
    Modal.confirm({
        title: 'Are you sure?',
        icon: createVNode(ExclamationCircleOutlined),
        content: 'This action cannot be undone.',
        async onOk() {
            try {
                const response = await axios.delete(route('delete_image', { id: imageId }));
                if (response.data.success) {
                    notification.success({ description: response.data.message });
                    await fetchImages();
                } else {
                    notification.error({ description: response.data.message });
                }
            } catch (error) {
                console.error('Delete failed', error);
                notification.error({ description: 'Error deleting image' });
            }
        },
    });
};

const openUpdateModal = (image) => {
    selectedImage.value = image;
    updateModalOpen.value = true;
};

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleString('en-US', {
        year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit'
    });
};

// Search function
const searchFunction = async () => {
    try {
        const response = await axios.get(route('search_images'), {
            params: { query: searchValue.value }
        });
        if (response.data.success) {
            images.value = response.data.images;
        }
    } catch (error) {
        console.error('Failed to search Images', error);
    }
};

// Filter by date
const dateSelected = async () => {
    try {
        const response = await axios.get(route('filterBy_date'), {
            params: { date: dateValue.value }
        });
        if (response.data.success) {
            images.value = response.data.images;
        }
    } catch (error) {
        console.error('Failed to filter date the images', error);
    }
};
watch(dateValue, (newValue) => {
    if (!newValue || newValue.length === 0) {
        fetchImages();
    }
});
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Content Management" />
        <div class="container mx-auto p-4 sm:p-6">
            <a-tabs v-model:activeKey="activeKey" centered>
                <a-tab-pane key="1" tab="Media">
                    <section class="text-center mb-8 mt-10">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Media Management</h2>
                        <p class="text-gray-500 text-sm sm:text-base">Upload, update, and delete videos & images.</p>
                    </section>

                    <div class="flex flex-col items-center space-y-4 text-center">
                        <a-upload v-model:file-list="fileList" :before-upload="beforeUpload" :multiple="true"
                            :accept="'.jpeg,.jpg,.png,.gif,.webp,.mp4,.mov,.avi,.mkv,.webm'" list-type="text"
                            class="w-full max-w-md">
                            <a-button type="primary"
                                class="flex items-center justify-center text-center bg-blue-500 text-white">
                                <upload-outlined /> Upload Files
                            </a-button>
                        </a-upload>

                        <a-button v-if="fileList.length" @click="handleUpload"
                            class="flex items-center bg-blue-600 text-white">
                            Upload Images
                        </a-button>
                    </div>

                    <div class="mt-6 flex justify-center">
                        <a-input-search @change="searchFunction" allow-clear v-model:value="searchValue" enter-button
                            placeholder="Search videos & images..."
                            class="w-full max-w-md transition-all duration-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="mt-6">
                        <h2 class="font-semibold text-xl mb-2">Filter by date:</h2>
                        <a-space direction="vertical" :size="12" class="w-full max-w-md">
                            <a-range-picker @change="dateSelected" v-model:value="dateValue" class="w-full" />
                        </a-space>
                    </div>

                    <section class="mt-6">
                        <h3 class="text-xl font-semibold mb-4 text-center">Uploaded Videos & Images</h3>
                        <div v-if="images.length"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <div v-for="image in images" :key="image.id"
                                class="p-4 border rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                <!-- Conditionally between images or videos  -->
                                <template
                                    v-if="image.file_path.endsWith('.mp4') || image.file_path.endsWith('.mov') || image.file_path.endsWith('.avi')">
                                    <video :src="`/storage/${image.file_path}`" autoplay controls
                                        class="w-full h-48 object-cover rounded-md aspect-vide0">
                                    </video>
                                </template>
                                <template v-else>
                                    <img :src="`/storage/${image.file_path}`" alt="Uploaded Image"
                                        class="w-full h-48 object-cover rounded-md mb-2">
                                </template>
                                <!-- Files Details  -->
                                <p class="text-gray-600 text-sm">{{ image.image_name }}</p>
                                <p class="text-gray-500 text-xs mt-2">Uploaded: {{ formatDate(image.created_at) }}</p>
                                <!-- Action buttons  -->
                                <div class="flex justify-end space-x-2 mt-3">
                                    <a-button type="danger" @click="deleteImage(image.id)"
                                        class="flex items-center text-red-600">
                                        <delete-outlined /> Delete
                                    </a-button>
                                    <a-button type="primary" @click="openUpdateModal(image)" class="flex items-center">
                                        <edit-outlined /> Edit
                                    </a-button>
                                </div>
                            </div>
                        </div>
                        <p v-else class="text-gray-500 text-center mt-6">No images found.</p>
                    </section>
                </a-tab-pane>
                <a-tab-pane key="2" tab="News & Events">
                    <p class="text-2xl sm:text-3xl font-bold text-gray-800 text-center mt-10">News & Events</p>
                    <div>
                        <p>Todays News</p>
                        <div></div>
                    </div>

                </a-tab-pane>
                <a-tab-pane key="3" tab="Announcements & Updates">
                    <p class="text-center text-gray-600">Coming soon...</p>
                </a-tab-pane>
            </a-tabs>
        </div>

        <UpdateImageModal v-if="selectedImage" :image="selectedImage" v-model:isOpen="updateModalOpen"
            @updated="fetchImages" />
    </AuthenticatedLayout>
</template>

<style scoped>
.container {
    max-width: 1200px;
}

/* Search bar animation */
.ant-input {
    transition: all 0.3s ease;
}

.ant-input:focus {
    box-shadow: 0 0 0 2px rgba(24, 144, 255, 0.2);
}

/* Responsive grid for images */
.grid {
    display: grid;
}

.h-48 {
    height: 12rem;
}

.object-cover {
    object-fit: cover;
}

.shadow-md {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.hover\:shadow-lg:hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.transition-shadow {
    transition: box-shadow 0.3s ease-in-out;
}
</style>
