<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { onMounted, ref } from 'vue';
import { notification } from 'ant-design-vue';
import { UploadOutlined, DeleteOutlined, EditOutlined } from '@ant-design/icons-vue';
import axios from 'axios';
import { Head } from '@inertiajs/vue3';
import { ExclamationCircleOutlined } from '@ant-design/icons-vue';
import { createVNode } from 'vue';
import { Modal } from 'ant-design-vue';
import UpdateImageModal from '@/Components/UpdateImageModal.vue'; // Import the reusable modal

const fileList = ref([]);
const images = ref([]);
const activeKey = ref('1');
const updateModalOpen = ref(false);
const selectedImage = ref(null);

const beforeUpload = () => {
    return false;
};

// Handle upload function
const handleUpload = async () => {
    if (fileList.value.length === 0) {
        notification.warning({
            description: 'No images selected',
        });
        return;
    }

    const formData = new FormData();
    fileList.value.forEach(file => {
        formData.append('files[]', file.originFileObj);
    });

    try {
        const response = await axios.post(route('upload_images'), formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        if (response.data.success) {
            notification.success({
                description: response.data.message,
            });
            fileList.value = [];
            await fetchImages();
        } else {
            notification.error({
                description: response.data.message,
            });
        }
    } catch (error) {
        console.error('Failed to upload images', error);
        notification.error({
            description: 'Failed to upload. The image has an invalid extension.',
        });
    }
};

// Fetch images function
const fetchImages = async () => {
    try {
        const response = await axios.get(route('display_images'));
        if (response.data.success) {
            images.value = response.data.images;
        }
    } catch (error) {
        console.error('Failed to display images', error);
    }
};

// Delete image function
const deleteImage = async (imageId) => {
    Modal.confirm({
        title: 'Confirmation?',
        icon: createVNode(ExclamationCircleOutlined),
        content: createVNode(
            'div',
            {
                style: 'color:red;',
            },
            'Are you sure to delete this image?',
        ),
        async onOk() {
            try {
                const response = await axios.delete(route('delete_image', { id: imageId }));
                if (response.data.success) {
                    notification.success({
                        description: response.data.message,
                    });
                    await fetchImages();
                } else {
                    notification.error({
                        description: response.data.message,
                    });
                }
            } catch (error) {
                console.error('Failed to delete image', error);
                notification.error({
                    description: 'Failed to delete image. Please try again.',
                });
            }
        },
        onCancel() {
            console.log('Cancel');
        },
    });
};

// Open update modal with the selected image
const openUpdateModal = (image) => {
    selectedImage.value = image;
    updateModalOpen.value = true;
};

// Format the image date created
const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });
};

// Display the images
onMounted(() => {
    fetchImages();
});
</script>

<template>
    <AuthenticatedLayout>

        <Head title="Upload update images" />
        <a-tabs v-model:activeKey="activeKey" centered>
            <a-tab-pane key="1" tab="Updates">
                <section>
                    <div class="p-4">
                        <a-input placeholder="Input search here..." class="w-full md:w-1/2 lg:w-1/3 mb-4" />

                        <div class="mb-6">
                            <p class="text-lg font-semibold">Manage Update Images</p>
                        </div>

                        <div class="mb-6">
                            <a-upload v-model:file-list="fileList" :before-upload="beforeUpload" list-type="picture"
                                :multiple="true">
                                <a-button>
                                    <upload-outlined></upload-outlined>
                                    Select pictures to upload
                                </a-button>
                            </a-upload>

                            <a-button @click="handleUpload" class="mt-4 bg-blue-500 text-white hover:bg-blue-600">
                                Upload
                            </a-button>
                        </div>
                    </div>
                </section>

                <section class="p-4">
                    <div>
                        <p class="text-lg font-semibold mb-4">Uploaded Images</p>
                        <div v-if="images.length > 0"
                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            <div v-for="image in images" :key="image.id"
                                class="border p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                                <img :src="`/storage/${image.file_path}`" alt="Uploaded Image"
                                    class="w-full h-48 object-cover rounded-md mb-2">
                                <p class="text-gray-600 text-sm mb-2">
                                    {{ image.image_name }}
                                </p>
                                <p class="text-gray-600 text-sm mb-4">
                                    Uploaded on: {{ formatDate(image.created_at) }}
                                </p>
                                <div class="flex justify-end space-x-2">
                                    <a-button @click="deleteImage(image.id)" type="danger" class="flex items-center">
                                        <delete-outlined />
                                        Delete
                                    </a-button>
                                    <a-button @click="openUpdateModal(image)" type="primary" class="flex items-center">
                                        <edit-outlined />
                                        Update
                                    </a-button>
                                </div>
                            </div>
                        </div>
                        <p v-else class="text-gray-500">No images uploaded yet.</p>
                    </div>
                </section>
            </a-tab-pane>
        </a-tabs>

        <!-- Reusable Update Modal -->
        <UpdateImageModal v-if="selectedImage" :image="selectedImage" v-model:isOpen="updateModalOpen"
            @updated="fetchImages" />
    </AuthenticatedLayout>
</template>

<style scoped>
/* Custom styles for responsiveness */
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
