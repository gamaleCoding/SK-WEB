<script setup>
import Checkbox from '@/Components/Checkbox.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link, router, useForm } from '@inertiajs/vue3'

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
})

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
        },
    })
}
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <div class="flex w-full min-h-screen items-center justify-center">
            <div class="grid w-full max-w-5xl grid-cols-1 gap-6 bg-white p-8 shadow-lg sm:grid-cols-2 rounded-lg">
                <!-- Left Side: Image Background -->
                <div class="relative sm:block">
                    <img v-if="!form.email && !form.password"
                        src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExeXA2d3ZrZnNlMXBod2IwOWRzeGJ5NHVkbHVneTh3OTB5Y2Q4bjJ6ayZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/PAqjdPkJLDsmBRSYUp/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Login Animation" />
                    <img v-else-if="form.errors.email || form.errors.password"
                        src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExb3k3dHMzcGpmNXdnNXB1cXo3eGRwb3RhbHpsZWxsdnV5bDB2ZTkzbSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/i7PFn5ihZdn8cD9Cwa/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Error Animation" />
                    <img v-else-if="form.password"
                        src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2RmZHlvaDJqOW9rbjViem1iZTRneDRzZGd5emxyMGVpdm5hNDRvNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2Gp7eaYbWaOtdpBrFm/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Login Animation" />
                    <img v-else-if="form.email"
                        src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2RmZHlvaDJqOW9rbjViem1iZTRneDRzZGd5emxyMGVpdm5hNDRvNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2Gp7eaYbWaOtdpBrFm/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Login Animation" />
                </div>

                <!-- Right Side: Login Form -->
                <div v-if="!showLoginImage" class="flex flex-col justify-center items-center">
                    <!-- back button  -->
                    <div class="mb-6 text-center">
                        <!-- <button
                            class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition duration-300">
                            <Link :href="route('welcome')">Back to Welcome Page</Link>
                        </button> -->
                        <!-- sk logo  -->
                        <Link :href="route('welcome')" class="flex justify-center items-center direction-column">
                        <img src="/images/sk.webp" class="w-12 h-12" />
                        </Link>
                        <div class="mt-2">
                            <h2 class="text-2xl font-bold text-gray-700">Welcome Back</h2>
                            <p class="text-gray-600">Log in to continue</p>
                        </div>
                    </div>

                    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autofocus autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />
                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                required autocomplete="current-password" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4 block">
                            <label class="flex items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ms-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>

                        <div class="mt-4 flex items-center justify-between gap-2">
                            <Link v-if="canResetPassword" :href="route('password.request')"
                                class="text-sm text-gray-600 underline hover:text-gray-900 focus:ring-2 focus:ring-gray-500">
                            Forgot your password?
                            </Link>

                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Log in
                            </PrimaryButton>
                            <Link :href="route('welcome')" class=" ms-4 text-red-600 font-semibold text-lg hover:text-red-700">
                                Cancel
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
