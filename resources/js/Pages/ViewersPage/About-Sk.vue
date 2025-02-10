<script setup>
import ViewersLayout from '@/Layouts/ViewersLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>

    <Head title="About Sk" />

    <ViewersLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full max-w-4xl mx-auto">
                            <n-carousel effect="custom" :transition-props="{ name: 'creative' }" show-arrow
                                style="width: 100%; height: 240px">
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
                        <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                            <strong class="block text-xl mb-4 text-center">History</strong> <br>
                            The Sangguniang Kabataan (SK) is the youth council in the Philippines that provides young
                            people
                            with a platform for leadership and governance. It was established through the Local
                            Government
                            Code of 1991 (Republic Act No. 7160) as a replacement for the Kabataang Barangay (KB), which
                            was
                            abolished due to concerns over political influence. Over the years, SK has undergone
                            reforms,
                            most notably with the SK Reform Act of 2015 (Republic Act No. 10742) to improve its
                            transparency, accountability, and effectiveness.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full max-w-4xl mx-auto">
                            <n-carousel effect="custom" :transition-props="{ name: 'creative' }" show-arrow
                                style="width: 100%; height: 240px">
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
                        <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                            <strong class="block text-xl mb-4 text-center">Purpose and Goals</strong> <br>
                            The SK aims to empower the youth by involving them in decision-making processes, governance,
                            and community development. It focuses on nurturing young leaders and encouraging active
                            participation in civic and social affairs.
                            <strong class="block text-xl mb-4 text-center">The primary goals of SK include:</strong>
                            <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                                <li>
                                    Youth Empowerment – Providing opportunities for leadership, governance, and civic
                                    engagement.
                                </li>
                                <li>
                                    Community Development – Implementing programs and projects that benefit the youth
                                    and
                                    the
                                    barangay.
                                </li>
                                <li>
                                    Skill and Capacity Building – Enhancing the abilities of young leaders through
                                    training
                                    and
                                    education.
                                </li>
                                <li>Youth Representation – Ensuring that the interests of young people are considered in
                                    local
                                    governance.</li>
                            </p>
                        </p>
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

:deep(.creative-enter-from),
:deep(.creative-leave-to) {
    opacity: 0;
    transform: scale(0.8);
}

:deep(.creative-enter-active),
:deep(.creative-leave-active) {
    transition: all 0.3s ease;
}
</style>
