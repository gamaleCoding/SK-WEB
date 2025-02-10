<script setup>
import ViewersLayout from '@/Layouts/ViewersLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import dayjs from 'dayjs';

// Sample council members data
const councilMembers = ref([
    {
        name: "GLENN BENIGA", position: "SK Chairperson", picture: "/images/profile.jpg", social: [
            { platform: "Facebook", link: "https://facebook.com/GlennBeniga" },
            { platform: "Instagram", link: "https://instagram.com/GlennBeniga" },
            { platform: "Twitter", link: "https://twitter.com/GlennBeniga" }
        ],
        about: "Glenn Beniga is a hardworking SK Chairman who cares about the youth and the community. He leads with dedication, creating programs that help young people grow and work together. His efforts inspire others and make a positive difference in many lives."

    },
    {
        name: "REYMARK SALDOM", position: "SK Kagawad", picture: "/images/the-rock.jpg", social: [
            { platform: "Facebook", link: "https://facebook.com/ReymarkSaldom" },
            { platform: "Instagram", link: "https://instagram.com/ReymarkSaldom" },
            { platform: "Twitter", link: "https://twitter.com/ReymarkSaldom" }
        ],
        about: "Reymark Saldom is the First SK Kagawad, known for his dedication and hard work in serving the youth. He always finds ways to support the SK Chairman and the community with his leadership and commitment. But aside from that, his biggest challenge? Being too handsome a true pogi problem!"
    },
    {
        name: "DAISYRIE BARCENAL", position: "SK Kagawad", picture: "/images/hagdanrice.jpg",
        social: [
            { platform: "Facebook", link: "https://facebook.com/DaisyrieBarcenal" },
            { platform: "Instagram", link: "https://instagram.com/DaisyrieBarcenal" },
            { platform: "Twitter", link: "https://twitter.com/DaisyrieBarcenal" }
        ],
        about: "Daisyrie Barcenal is the Second SK Kagawad, always ready to serve and support the youth with her dedication and passion. She plays an important role in making every project successful and meaningful for the community. But aside from being a leader, she’s also the Eyelash Extension Queen, making sure beauty and service go hand in hand!"
    },
    {
        name: "PEREGRINO DALOGDOG", position: "SK Kagawad", picture: "/images/loboc.jpg",
        social: [
            { platform: "Facebook", link: "https://facebook.com/PeregrinoDalogdog" },
            { platform: "Instagram", link: "https://instagram.com/PeregrinoDalogdog" },
            { platform: "Twitter", link: "https://twitter.com/PeregrinoDalogdog" }
        ],
        about: "Peregrino Dalogdog is the Third SK Kagawad, always committed to helping the youth and making a positive impact in the community. He actively supports sports programs and other SK projects with dedication and hard work. But when it comes to basketball, he’s the Dayo Basketball Serye Master, always ready to dominate any court, anywhere!"
    },
    {
        name: "TEOFREDO GAMALE", position: "SK Kagawad", picture: "/images/river.jpg",
        social: [
            { platform: "Facebook", link: "https://facebook.com/TeofredoGamale" },
            { platform: "Instagram", link: "https://instagram.com/TeofredoGamale" },
            { platform: "Twitter", link: "https://twitter.com/TeofredoGamale" }
        ],
        about: "Teofredo Gamale, the fourth SK Kagawad, is a well-rounded individual with a good balance in life. He values emotional, spiritual, physical, and social well-being while also having a passion for sports. Aside from his dedication to the youth, he is also skilled in web programming, always looking for ways to improve and help others through technology."
    },
    {
        name: "KING RANDOLPH PETALLO", position: "SK Kagawad", picture: "/images/corevalues.webp",
        social: [
            { platform: "Facebook", link: "https://facebook.com/KingPetallo" },
            { platform: "Instagram", link: "https://instagram.com/KingPetallo" },
            { platform: "Twitter", link: "https://twitter.com/KingPetallo" }
        ],
        about: "King Randolph Petallo, the fifth SK Kagawad, is known for his charm and friendly nature. He has a way of winning hearts, making him the ultimate girl hearts catcher, but beyond that, he is a true friend to everyone. Always approachable and ready to help, he brings warmth and positivity to the youth."
    },
    {
        name: "ELLA ESTOMATA", position: "SK Kagawad", picture: "/images/goals.webp",
        social: [
            { platform: "Facebook", link: "https://facebook.com/EllaEstomata" },
            { platform: "Instagram", link: "https://instagram.com/EllaEstomata" },
            { platform: "Twitter", link: "https://twitter.com/EllaEstomata" }
        ],
        about: "Ella Estomata, the sixth SK Kagawad, is a talented singer with a voice that captivates everyone. She is also the go-to host for youth programs, always bringing energy and confidence to every opening ceremony. Her passion for music and leadership makes her an inspiring figure among the youth."
    },
    {
        name: "ANAMIE BASLOT", position: "SK Kagawad", picture: "/images/about.webp",
        social: [
            { platform: "Facebook", link: "https://facebook.com/Anamie Baslot" },
            { platform: "Instagram", link: "https://instagram.com/Anamie Baslot" },
            { platform: "Twitter", link: "https://twitter.com/Anamie Baslot" }
        ],
        about: "Anamie Baslot, the seventh SK Kagawad, is a passionate and active youth leader, especially in the world of sports. She has proven her dominance in volleyball, showcasing her skills and dedication to the game. Beyond sports, her charm and energy make her a true inspiration to the youth and a heart-catcher among many."
    },
    {
        name: "HANNAH MAE DACLES", position: "SK Secretary", picture: "/images/onic.webp",
        social: [
            { platform: "Facebook", link: "https://facebook.com/HannahDacles" },
            { platform: "Instagram", link: "https://instagram.com/HannahDacles" },
            { platform: "Twitter", link: "https://twitter.com/HannahDacles" }
        ],
        about: "Hannah Dacles, the SK Secretary, is a powerhouse of intelligence and dedication. She is not only a brilliant leader but also an inspiration to the youth, always ready to serve with wisdom and passion. Her commitment to making a difference makes her a true role model in the community."
    },
    {
        name: "JULIE ANN JALE", position: "SK Treasurer", picture: "/images/champion.webp",
        social: [
            { platform: "Facebook", link: "https://facebook.com/JulieAnnJale" },
            { platform: "Instagram", link: "https://instagram.com/JulieAnnJale" },
            { platform: "Twitter", link: "https://twitter.com/JulieAnnJale" }
        ],
        about: "Julie Ann Jale, the SK Treasurer, is known for her strong commitment to policies and her strict approach to handling confidential funds with integrity. Beyond her financial responsibilities, she is also a talented dancer who inspires the youth with her passion and dedication. Her balance of discipline and creativity makes her a valuable leader in the community."

    },
]);

// Modal state
const showModal = ref(false);
const selectedMember = ref(null);

// Function to open the modal
const openModal = (member) => {
    selectedMember.value = member;
    showModal.value = true;
};

// Function to close the modal
const closeModal = () => {
    showModal.value = false;
    selectedMember.value = null;
};
</script>

<template>

    <Head title="Youth Council" />

    <ViewersLayout>
        <div class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-7xl">
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <!-- SK Chairperson -->
                    <div class="text-center mb-6">
                        <img src="/images/group-picture.jpg" alt="SK Chairperson"
                            class="w-full max-w-lg mx-auto rounded-lg shadow-md" />
                        <p class="text-lg font-semibold mt-2">GLENN BENIGA</p>
                        <span class="text-gray-600">SK Chairperson</span><br>
                        <button @click="openModal(councilMembers[0])"
                            class="mt-2 px-4 py-2 bg-orange-600 text-white rounded-lg shadow-md hover:bg-orange-700">View
                            More</button>
                    </div>

                    <!-- Welcome Text -->
                    <div class="text-center mb-6">
                        <p class="text-lg font-semibold">Welcome to the Sanggunian Kabataan (SK) Council</p>
                        <p class="text-gray-700">Our SK Council is dedicated to empowering the youth by fostering
                            leadership,
                            community development, and active participation. We work together to create programs and
                            initiatives
                            that uplift our barangay and provide opportunities for young individuals to thrive.</p>
                    </div>

                    <!-- SK Council Members -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                        <div v-for="member in councilMembers.slice(1)" :key="member.name" class="text-center">
                            <img :src="member.picture" :alt="member.name"
                                class="w-full h-48 object-cover rounded-lg shadow-md" />
                            <p class="mt-2 font-semibold">{{ member.name }}</p>
                            <span class="text-gray-600">{{ member.position }}</span><br>
                            <button @click="openModal(member)"
                                class="mt-2 px-4 py-2 bg-orange-600 text-white rounded-lg shadow-md hover:bg-orange-700">
                                View More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL -->
        <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div
                class="bg-white p-4 md:p-6 shadow-lg w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-2xl text-center mt-20 h-sm">
                <div class="md:mt-5 flex justify-end">
                    <button @click="closeModal"
                        class="bg-orange-600 text-white font-bold px-3 py-1 md:px-4 md:py-2 rounded-lg hover:bg-orange-700 transition duration-300">Exit</button>
                </div>
                <img :src="selectedMember.picture" :alt="selectedMember.name"
                    class="w-50 h-50 md:w-50 md:h-50 h-40 mx-auto shadow-md" />
                <p class="mt-3 md:mt-4 font-semibold text-base md:text-lg">{{ selectedMember.name }}</p>
                <span class="text-gray-600 text-sm md:text-base">{{ selectedMember.position }}</span>
                <div class="mt-3 md:mt-5 text-sm md:text-base">
                    {{ selectedMember.about }}
                </div>
                <hr class="my-4 md:my-6 border-gray-400 opacity-50 w-2/3 mx-auto">
                <div class="mt-3 md:mt-5">
                    <p class="font-bold text-base md:text-lg">Contacts</p>
                </div>
                <div>
                    <ul class="flex justify-center mt-3 md:mt-5 space-x-3 md:space-x-5">
                        <li v-for="(social, index) in selectedMember.social" :key="index">
                            <a :href="social.link" target="_blank"
                                class="text-gray-800 hover:text-gray-900 dark:hover:text-orange-600 dark:text-gray-600">
                                <svg v-if="social.platform === 'Facebook'" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                                    <path clip-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <svg v-else-if="social.platform === 'Instagram'" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                                    <path clip-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <svg v-else-if="social.platform === 'Twitter'" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
                <hr class="my-4 md:my-6 border-gray-400 opacity-50 w-2/3 mx-auto">
                <footer>
                    <div class="container mx-auto px-6 text-center">
                        <p class="text-gray-800 text-sm md:text-lg">
                            &copy; 2024 - {{ dayjs().year() }} SK-OWAC Web. All rights reserved.
                        </p>
                    </div>
                </footer>
            </div>
        </div>

    </ViewersLayout>
</template>
