<script setup>
import { Link, router, Head } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';
import { notification } from 'ant-design-vue';

const showModal = ref(false);

const concernsForm = reactive({
    message: '',
    errors: {}
})

const submitConcernButton = async () => {
    concernsForm.errors = {};

    if (!concernsForm.message) {
        concernsForm.errors.message = 'Please create the concerns before submitting.';
        return;
    }
    try {
        router.get(route('concern_message'), {
            ...concernsForm
        }, {
            onSuccess: (page) => {
                if (page.props.flash.success) {
                    notification.success({
                        description: page.props.flash.success
                    });
                } else if (page.props.flash.error) {
                    notification.error({
                        message: 'ERROR',
                        description: page.props.flash.error
                    });
                } else {
                    console.warn('Flash messages are missing', page);
                    console.error({
                        message: 'ERROR',
                        description: 'Something went wrong. Please try again later'
                    });
                }

                showModal.value = false;
            },
            onError: () => {
                if (page.props.flash.error) {
                    notification.error({
                        message: 'ERROR',
                        description: page.props.flash.error
                    });
                }
            }
        })
    }
    catch (error) {
        console.error('Failed to submit concerns', error);
    }

};
</script>

<template>

    <Head title="Concerns" />

    <div class="flex flex-col justify-center items-center min-h-screen p-6 bg-gray-100 relative overflow-hidden">
        <!-- GIF Background  -->
        <div class="absolute inset-0 z-0">
            <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExdjNpbHI1eDU3dDUzZXp0Mzg5MzNiZXM4NzlwN2VyaThqNHh0bWhyciZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/AYtArqGaUAJKmqSMjL/giphy.gif"
                class="object-cover w-full h-full" />
        </div>

        <!-- Content Section -->
        <div class="z-10 w-full max-w-4xl p-8 bg-white bg-opacity-80 rounded-lg shadow-xl">
            <!-- GIF Section -->
            <div class="mb-8">
                <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExM3lncWxwNjByeG02ajU3b3h1bWcxdTg3am00MWJ0M3FhN2J6cjkyMiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/dwyrEX7NthbwLcxcK7/giphy.gif"
                    class="w-full max-w-sm mx-auto rounded-lg shadow-lg" alt="Angry Reaction" />
            </div>

            <!-- Text Section -->
            <div class="text-center mb-8">
                <p class="text-xl font-semibold text-gray-700">WHAT'S YOUR CONCERN MY FRIEND?</p>
            </div>

            <!-- Links Section -->
            <div class="flex flex-col sm:flex-row gap-6 sm:gap-8 justify-center">
                <button @click="() => (showModal = true)"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                    I have some concerns I'd like to suggest
                </button>
                <Link :href="route('welcome')"
                    class="font-bold text-center text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition duration-300">
                No, I don't have concerns
                </Link>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <a-modal v-model:open="showModal" :footer="false">
        <a-card style="width: 90%; max-width: 600px" :bordered="false" size="huge" role="dialog" aria-modal="true"
            class="mx-auto">
            <div class="flex flex-col items-center p-4">
                <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExcDhwaXV0OGZpeHZtNGxraGVwZXlhaXIwa2ExamNsYXlmMDM2cHh4dSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/srsxGJpohcl51cyHJg/giphy.gif"
                    class="w-full max-w-xs rounded-lg shadow-lg mb-4" alt="Polite Reaction" />
                <p class="text-lg text-gray-500 mb-4 text-center italic">
                    Please be <span class="text-gray-600 font-semibold">respectful</span>, <span
                        class="text-gray-600 font-semibold">polite</span>, and <span
                        class="text-gray-600 font-semibold">honest</span> with your
                    concerns.<br>
                </p>


                <a-form-item :validate-status="concernsForm.errors.message ? 'error' : ''"
                    :help="concernsForm.errors.message">
                    <textarea v-model="concernsForm.message"
                        class="w-full  md:w-96 p-4 border border-gray-300 rounded-lg mb-4 resize-none" rows="4"
                        placeholder="Type your concerns here..."></textarea>
                </a-form-item>

                <div class="flex gap-4">
                    <button @click="submitConcernButton"
                        class="bg-gray-600 text-white text-lg px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                        Submit
                    </button>
                    <button @click="showModal = false"
                        class="font-semibold text-red-600 hover:text-red-700 text-lg transition duration-300">
                        Cancel
                    </button>
                </div>
            </div>
        </a-card>
    </a-modal>
</template>
