<script setup>
import ViewersLayout from '@/Layouts/ViewersLayout.vue';
import { Head } from '@inertiajs/vue3'
</script>

<template>

    <Head title="Dashboard" />

    <ViewersLayout>
        <div class="py-12">
            <!-- Section 1: Introduction -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-center">
                            <img class="w-full max-w-2xl rounded-lg"
                                src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExMjBqamw0d3hmYXlkcmpiazNxZTRhZTI1cWV0NGtjc3JuZ3FqcnZweiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/PAqjdPkJLDsmBRSYUp/giphy.gif"
                                alt="SK Introduction" />
                        </div>
                        <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                            <strong class="block text-xl mb-4">Introduction to Sangguniang Kabataan (SK)</strong>
                            The Sangguniang Kabataan (SK) is the official youth council in the Philippines, established
                            to empower young individuals in governance and community development. It serves as a
                            platform for the youth to participate in decision-making, implement projects, and contribute
                            to nation-building at the grassroots level.

                            Under the <strong>Republic Act No. 10742</strong>, also known as the <strong>SK Reform Act
                                of 2015</strong>,
                            the SK is
                            composed of elected youth leaders aged 18 to 24, led by the SK Chairperson and supported by
                            SK Council members. They work alongside barangay officials to create programs that address
                            the needs and aspirations of young Filipinos.

                            The SK is committed to promoting leadership, social responsibility, and active citizenship
                            among the youth. Through initiatives such as leadership training, environmental programs,
                            sports development, and livelihood projects, SK fosters growth and engagement among young
                            citizens, ensuring that they play a meaningful role in shaping their communities.

                            By providing a voice for the youth, the Sangguniang Kabataan continues to be an essential
                            part of local governance, nurturing future leaders who are dedicated to service, integrity,
                            and progress.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 2: Carousel and Mission -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full max-w-4xl mx-auto">
                            <n-carousel autoplay>
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg"
                                    alt="Carousel Image 1" />
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg"
                                    alt="Carousel Image 2" />
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg"
                                    alt="Carousel Image 3" />
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg"
                                    alt="Carousel Image 4" />
                            </n-carousel>
                        </div>
                        <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                            <strong class="block text-xl mb-4">Sangguniang Kabataan (SK) Mission</strong>
                            The Sangguniang Kabataan (SK) is dedicated to empowering the youth by fostering leadership,
                            active participation, and social responsibility in local governance. Its mission is to:<br>

                        <ul class="list-disc list-inside text-left max-w-2xl mx-auto mt-4">
                            <li>Promote Youth Leadership & Development – Cultivate young leaders who are proactive,
                                responsible, and committed to serving their communities.</li>
                            <li>Encourage Active Youth Participation – Ensure that young people have a voice in
                                decision-making processes that affect their lives and communities.</li>
                            <li>Implement Meaningful & Sustainable Programs – Develop initiatives that focus on
                                education, health, environment, livelihood, sports, and cultural development.</li>
                            <li>Uphold Good Governance & Transparency – Maintain integrity, accountability, and
                                inclusivity in all SK programs and activities.</li>
                            <li>Foster Nationalism & Social Responsibility – Instill love for country, respect for
                                diversity, and a commitment to social change.</li>
                        </ul>
                        Through these principles, the SK aims to shape a new generation of youth leaders who
                        will drive progress and innovation for a better future.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 3: SK’s Role in Empowering the Youth -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full max-w-4xl mx-auto">
                            <n-carousel autoplay>
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel1.jpeg"
                                    alt="Carousel Image 1" />
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel2.jpeg"
                                    alt="Carousel Image 2" />
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel3.jpeg"
                                    alt="Carousel Image 3" />
                                <img class="carousel-img w-full h-64 sm:h-96 object-cover rounded-lg"
                                    src="https://naive-ui.oss-cn-beijing.aliyuncs.com/carousel-img/carousel4.jpeg"
                                    alt="Carousel Image 4" />
                            </n-carousel>
                        </div>
                        <p class="mt-6 text-base leading-relaxed text-center max-w-2xl mx-auto">
                            <strong class="block text-xl mb-4">SK’s Role in Empowering the Youth</strong>
                            The Sangguniang Kabataan (SK) plays a crucial role in shaping the future of young Filipinos
                            by providing them with opportunities to lead, serve, and make a positive impact in their
                            communities. Through its programs and initiatives, the SK empowers the youth in various
                            ways:

                        <ul class="list-disc list-inside text-left max-w-2xl mx-auto mt-4">
                            <li>Encouraging Youth Leadership – SK serves as a platform for young leaders to develop
                                their leadership skills, gain experience in governance, and contribute to community
                                development.</li>
                            <li>Providing a Voice in Governance – As the official youth council in the barangay, SK
                                ensures that the concerns, needs, and aspirations of young people are heard and
                                addressed in local policies and programs.</li>
                            <li>Promoting Education and Skills Development – SK organizes seminars, training, and
                                scholarship programs to help the youth acquire new knowledge, enhance their skills,
                                and prepare for their future careers.</li>
                            <li>Advocating for Youth Welfare and Rights – SK works to protect and promote the rights
                                of young people, ensuring they have access to education, healthcare, and
                                opportunities for personal growth.</li>
                            <li>Encouraging Active Citizenship and Volunteerism – Through outreach programs,
                                environmental initiatives, and community service projects, SK inspires young
                                individuals to take part in nation-building and become responsible citizens.</li>
                            <li>Enhancing Youth Participation in Sports and Culture – By organizing sports
                                tournaments, cultural events, and talent programs, SK nurtures the talents of young
                                individuals and promotes a healthy, active lifestyle.</li>
                            <li>Fostering Unity and Inclusivity – SK brings together youth from diverse backgrounds
                                to collaborate on meaningful projects, promoting teamwork, inclusivity, and social
                                harmony.</li>
                            <li>Driving Sustainable and Community-Based Development – SK ensures that youth
                                initiatives align with long-term community goals, addressing issues such as
                                environmental protection, livelihood programs, and mental health awareness.</li>
                        </ul>
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
    height: auto;
    object-fit: cover;
    border-radius: 0.5rem;
}

@media (min-width: 640px) {
    .carousel-img {
        height: 24rem;
        /* Adjust height for larger screens */
    }
}
</style>
