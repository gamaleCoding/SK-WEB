<script setup>
import ViewersLayout from '@/Layouts/ViewersLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>

    <Head title="Events" />
    <ViewersLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div>
                        <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                            <strong class="block text-xl mb-4 text-center">🔥 Ongoing SK Events & Activities</strong>
                            <br>
                            Stay updated with the latest events happening right now in our barangay! Join us and be part
                            of activities that empower the youth and build a stronger community. Check out what's
                            happening today!
                        </p>
                        <n-carousel autoplay>
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                        </n-carousel>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                        <strong class="block text-xl mb-4 text-center">📅 Upcoming SK Events & Activities</strong>
                        <br>
                        Stay updated with the latest events organized by your Sangguniang Kabataan (SK)! Join us in
                        making a difference in our community. Check out our upcoming activities below:
                    </p>
                    <div>
                        <n-carousel autoplay>
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                        </n-carousel>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                        <strong class="block text-xl mb-4 text-center">✅ Past SK Events & Highlights</strong>
                        <br>
                        Here’s a recap of our successful events! Thank you to everyone who participated and supported
                        our initiatives. Let’s look back on the moments that brought our community together.
                    </p>
                    <div>
                        <n-carousel autoplay>
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                        </n-carousel>
                    </div>
                </div>
            </div>
        </div>
    </ViewersLayout>
</template>
