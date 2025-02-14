<!-- resources/js/Components/UpdateImageModal.vue -->
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
            emit('updated'); // Notify parent to refresh the image list
            emit('update:isOpen', false); // Close the modal
        } else {
            notification.error({
                description: response.data.message,
            });
        }
    } catch (error) {
        console.error('Failed to update image', error);
        notification.error({
            description: 'Failed to update image. Please try again.',
        });
    }
};

// Handle modal cancel button
const handleCancel = () => {
    emit('update:isOpen', false); // Close the modal
};

// Watch for changes in the image prop
watch(() => props.image, (newImage) => {
    description.value = newImage.description || '';
}, { immediate: true });
</script>

<template>
    <a-modal :open="isOpen" title="Update Image Description" @ok="handleOk" @cancel="handleCancel">
        <img :src="`/storage/${image.file_path}`" alt="Uploaded Image" class="w-full h-48 object-cover rounded-md mb-4" />
        <a-form-item label="Description">
            <a-textarea v-model:value="description" placeholder="Enter image description" :rows="4" />
        </a-form-item>
    </a-modal>
</template>
