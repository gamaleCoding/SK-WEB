<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

defineProps({
    status: {
        type: String,
    },
})

const form = useForm({
    email: '',
})

const submit = () => {
    form.post(route('password.email'))
}
</script>

<template>
    <GuestLayout>

        <Head title="Forgot Password" />

        <div class="flex w-full min-h-screen items-center justify-center">
            <div class="grid w-full max-w-4xl grid-cols-1 gap-6 sm:grid-cols-2 bg-white p-8 shadow-lg sm:rounded-lg">
                <!-- Left Side: Image Background -->
                <div class="relative sm:block">
                    <img v-if="!form.email"
                        src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExOGFkZXc1Yng3ZnZ2bWd0eThwam9ydDZqOWh1ZWxjeHo3NnBkY2x4NSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/q3w1IdISgxTzWUN80b/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Forgot Password Animation" />
                    <img v-else
                        src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2RmZHlvaDJqOW9rbjViem1iZTRneDRzZGd5emxyMGVpdm5hNDRvNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2Gp7eaYbWaOtdpBrFm/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Forgot Password Animation" />
                </div>

                <!-- Right Side: Reset Password Form -->
                <div class="flex flex-col justify-center items-center">
                    <div class="mb-6 text-center">
                        <!-- sk logo -->
                        <div class="flex justify-center items-center direction-column">
                            <img src="/images/sk.webp" class="w-12 h-12" />
                        </div>
                        <div class="mt-2">
                            <h2 class="text-2xl font-bold text-gray-700">Forgot Your Password?</h2>
                            <p class="text-gray-600">Enter your email address to receive a password reset link.</p>
                        </div>
                    </div>

                    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit" class="w-full">
                        <!-- Email -->
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <!-- Reset Button -->
                        <div class="mt-4 flex items-center justify-end gap-4">
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Email Password Reset Link
                            </PrimaryButton>
                            <Link class="text-red-600 hover:text-red-700 font-bold text-lg" :href="route('login')">
                            Cancel
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
