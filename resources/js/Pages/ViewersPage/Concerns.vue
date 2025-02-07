<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex flex-col justify-center items-center min-h-screen p-4">
        <!-- GIF Section -->
        <div class="mb-6">
            <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExOGFkZXc1Yng3ZnZ2bWd0eThwam9ydDZqOWh1ZWxjeHo3NnBkY2x4NSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/q3w1IdISgxTzWUN80b/giphy.gif"
                class="w-full max-w-xs mx-auto" alt="Angry Reaction" />
        </div>

        <!-- Text Section -->
        <div class="text-center mb-6">
            <p class="text-lg font-semibold text-gray-700">WHAT'S YOUR CONCERN MY FRIEND?</p>
            <p class="text-lg font-semibold text-red-600">I'M SO ANGRY MAN..</p>
        </div>

        <!-- Links Section -->
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-5 justify-center">
            <Link :href="route('welcome')" class="text-red-600 underline text-center sm:text-left">I have no concerns
            </Link>
            <Link class="text-green-600 underline text-center sm:text-left">I have concerns to suggest</Link>
        </div>
    </div>
</template>
