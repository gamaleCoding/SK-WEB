<script setup>
import { ref, watch } from 'vue';
import { notification } from 'ant-design-vue';
import axios from 'axios';

const props = defineProps({
    image: {
        type: Object,
        required: true,
    },
    isOpen: {
        type: Boolean,
        required: true,
    },
});

const emit = defineEmits(['update:isOpen', 'updated']);

const description = ref(props.image.description || '');

// Handle modal OK button
const handleOk = async () => {
    try {
        const response = await axios.put(route('update_image', { id: props.image.id }), {
            description: description.value,
        });

        if (response.data.success) {
            notification.success({
                description: response.data.message,
            });
            emit('updated');
            emit('update:isOpen', false);
        } else {
            notification.error({
                description: response.data.message,
            });
        }
    } catch (error) {
        console.error('Failed to update image', error);
        notification.error({
            description: 'Failed to update image. Please input description first.',
        });
    }
};

// Handle modal cancel button
const handleCancel = () => {
    emit('update:isOpen', false);
};

// Watch for changes in the image prop
watch(() => props.image, (newImage) => {
    description.value = newImage.description || '';
}, { immediate: true });
</script>

<template>
    <a-modal :open="isOpen" title="Update Image Description" @ok="handleOk" @cancel="handleCancel" :width="600"
        class="custom-modal">
        <div class="flex flex-col items-center space-y-4">
            <div class="w-full max-w-md">
                <template
                    v-if="image.file_path.endsWith('.mp4') || image.file_path.endsWith('.mov') || image.file_path.endsWith('.avi')">
                    <video :src="`/storage/${image.file_path}`" autoplay controls
                        class="w-full h-48 object-cover rounded-md aspect-vide0">
                    </video>
                </template>
                <template v-else>
                    <img :src="`/storage/${image.file_path}`" alt="Uploaded Image"
                        class="w-full h-64 object-cover rounded-lg shadow-md" />
                </template>
            </div>

            <a-form-item label="Description" class="w-full max-w-md">
                <a-textarea v-model:value="description" placeholder="Enter image description" :rows="4"
                    class="w-full" />
            </a-form-item>
        </div>
    </a-modal>
</template>

<style scoped>
.custom-modal .ant-modal-body {
    padding: 20px;
}
</style>
