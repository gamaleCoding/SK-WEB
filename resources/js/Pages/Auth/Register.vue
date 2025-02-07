<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <GuestLayout>

        <Head title="Register" />

        <div class="flex w-full min-h-screen items-center justify-center">
            <div class="grid w-full max-w-5xl grid-cols-1 gap-6 bg-white p-8 shadow-lg sm:grid-cols-2 rounded-lg">
                <!-- Left Side: Image Background -->
                <div class="relative sm:block">
                    <img v-if="!form.name && !form.email && !form.password"
                        src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExeXA2d3ZrZnNlMXBod2IwOWRzeGJ5NHVkbHVneTh3OTB5Y2Q4bjJ6ayZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/PAqjdPkJLDsmBRSYUp/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Register Animation" />
                    <img v-else-if="form.name"
                        src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2RmZHlvaDJqOW9rbjViem1iZTRneDRzZGd5emxyMGVpdm5hNDRvNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2Gp7eaYbWaOtdpBrFm/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Register Animation" />
                    <img v-else-if="form.email"
                        src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2RmZHlvaDJqOW9rbjViem1iZTRneDRzZGd5emxyMGVpdm5hNDRvNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2Gp7eaYbWaOtdpBrFm/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Register Animation" />
                    <img v-else-if="form.password"
                        src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExZ2RmZHlvaDJqOW9rbjViem1iZTRneDRzZGd5emxyMGVpdm5hNDRvNSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/2Gp7eaYbWaOtdpBrFm/giphy.gif"
                        class="h-full w-full object-cover rounded-lg" alt="Register Animation" />
                </div>

                <!-- Right Side: Register Form -->
                <div class="flex flex-col justify-center items-center">
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
                            <h2 class="text-2xl font-bold text-gray-700">Welcome</h2>
                            <p class="text-gray-600">Create an account to get started</p>
                        </div>
                    </div>

                    <form @submit.prevent="submit">
                        <!-- Name -->
                        <div>
                            <InputLabel for="name" value="Name" />
                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                autofocus autocomplete="name" />
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autocomplete="username" />
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />
                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                required autocomplete="new-password" />
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <InputLabel for="password_confirmation" value="Confirm Password" />
                            <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                                v-model="form.password_confirmation" required autocomplete="new-password" />
                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>

                        <!-- Register Button -->
                        <div class="mt-4 flex items-center justify-between">
                            <Link class="text-gray-700 underline" :href="route('login')"> Already have account?
                            </Link>
                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Register
                            </PrimaryButton>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
