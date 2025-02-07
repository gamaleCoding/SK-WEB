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
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-center">
                            <img
                                src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExMHFtcWNzZmVrbzNpZGYzZ3FxZ2FzbWhydHlhd2JhcTNsdzU2OGxxZCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/PAqjdPkJLDsmBRSYUp/giphy.gif" />
                        </div>
                    </div>
                    <div>
                        <n-carousel :slides-per-view="3" :space-between="20" :loop="false" draggable>
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg">
                            <img class="carousel-img"
                                src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg">
                        </n-carousel>
                    </div>
                </div>
            </div>
        </div>
    </ViewersLayout>
</template>
<style scoped>
.carousel-img {
    width: 100%;
    height: 240px;
    object-fit: cover;
}
</style>
