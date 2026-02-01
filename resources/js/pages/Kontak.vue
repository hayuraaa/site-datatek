<script setup>
import AppLayout from './Layout/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: '',
    website_source: 'datatek', // Website source untuk DataTek
});

const handleSubmit = () => {
    form.post('/contact-forms/submit', {
        onSuccess: () => {
            form.reset();
        },
        preserveScroll: true,
    });
};
</script>

<template>

    <Head title="Hubungi Kami" />
    <AppLayout>
        <!-- Hero Section with Background Image -->
        <section class="relative w-full h-[350px] md:h-[400px] overflow-hidden">
            <!-- Background Image with Repeat -->
            <div class="absolute inset-0 bg-repeat bg-center"
                style="background-image: url('/bg/bg-4.jpg'); background-size: auto;">
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-black/55"></div>
            </div>

            <!-- Content Overlay -->
            <div class="relative z-10 h-full flex items-center">
                <div class="container mx-auto px-6 lg:px-8">
                    <div class="max-w-5xl">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-5 leading-tight">
                            Hubungi Kami
                        </h1>
                        <p class="text-sm md:text-base lg:text-lg text-white/90 leading-relaxed">
                            Kami menjangkau orang-orang yang mendukung gerakan Wikimedia, termasuk institusi pendidikan
                            dan pihak lainnya untuk membantu masyarakat Indonesia terlibat dalam proyek-proyek
                            Wikimedia. Kami ingin membangun dunia di mana setiap orang memiliki akses dan kesempatan
                            yang adil ke ilmu pengetahuan, serta agar setiap orang memiliki keterampilan dan informasi
                            yang mereka perlukan untuk berkembang di era digital.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Message -->
        <div v-if="$page.props.flash?.success" class="container mx-auto px-6 lg:px-8 mt-8">
            <div class="max-w-7xl mx-auto">
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ $page.props.flash.success }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <section class="py-12 md:py-16 bg-white">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center max-w-7xl mx-auto">

                    <!-- Left Column - Image -->
                    <div class="order-2 lg:order-1">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            Kirim Pesan
                        </h2>
                        <p class="text-gray-700 leading-relaxed text-lg mb-6">
                            Anda dan institusi Anda tertarik bekerja sama? Tim Data dan Teknologi Wikimedia Indonesia
                            sangat terbuka dengan berbagai bentuk kolaborasi. Silahkan hubungi kami, baik berupa
                            pertanyaan atau sekadar menyapa.
                        </p>
                        <div class="flex justify-center items-center">
                            <img src="/komunitas.jpg" alt="Hubungi Kami"
                                class="w-full h-[500px] object-cover rounded-lg shadow-lg" />
                        </div>
                    </div>

                    <!-- Right Column - Contact Form -->
                    <div class="order-1 lg:order-2">
                        <form @submit.prevent="handleSubmit" class="space-y-6">

                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" v-model="form.name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                                    :class="{ 'border-red-500': form.errors.name }"
                                    placeholder="Masukkan nama lengkap Anda" />
                                <p v-if="form.errors.name" class="mt-1 text-sm text-red-600">{{ form.errors.name }}</p>
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" v-model="form.email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                                    :class="{ 'border-red-500': form.errors.email }"
                                    placeholder="nama@email.com" />
                                <p v-if="form.errors.email" class="mt-1 text-sm text-red-600">{{ form.errors.email }}</p>
                            </div>

                            <!-- Phone Field -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="phone" v-model="form.phone" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                                    :class="{ 'border-red-500': form.errors.phone }"
                                    placeholder="08xxxxxxxxxx" />
                                <p v-if="form.errors.phone" class="mt-1 text-sm text-red-600">{{ form.errors.phone }}</p>
                            </div>

                            <!-- Subject Field -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subjek <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="subject" v-model="form.subject" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition"
                                    :class="{ 'border-red-500': form.errors.subject }"
                                    placeholder="Topik pesan Anda" />
                                <p v-if="form.errors.subject" class="mt-1 text-sm text-red-600">{{ form.errors.subject }}</p>
                            </div>

                            <!-- Message Field -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pesan / Komentar <span class="text-red-500">*</span>
                                </label>
                                <textarea id="message" v-model="form.message" required rows="5"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition resize-none"
                                    :class="{ 'border-red-500': form.errors.message }"
                                    placeholder="Tuliskan pesan atau komentar Anda di sini..."></textarea>
                                <p v-if="form.errors.message" class="mt-1 text-sm text-red-600">{{ form.errors.message }}</p>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" :disabled="form.processing"
                                    class="w-full bg-[#3D8FCF] hover:bg-[#2E6FA3] text-white font-semibold py-3 px-6 rounded-lg transition duration-200 ease-in-out transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                                    <span v-if="form.processing">Mengirim...</span>
                                    <span v-else>Kirim Pesan</span>
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>

        <!-- Bentuk Kolaborasi Section -->
        <section class="py-12 md:py-16 bg-gray-50">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 text-center">
                        Bentuk Kolaborasi
                    </h2>
                    <p class="text-gray-700 text-lg text-center mb-12">
                        Kami bekerja sama dengan berbagai pihak untuk menyebarluaskan pengetahuan secara bebas, termasuk
                        instansi pendidikan, komunitas, media, dan lainnya
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

                        <!-- Kolaborasi 1 -->
                        <div class="bg-white p-8 rounded-lg shadow-md">
                            <div class="text-[#3D8FCF] text-5xl font-bold mb-4">1.</div>
                            <p class="text-gray-700 leading-relaxed">
                                Pengenalan dan pemanfaatan proyek-proyek Wikimedia dalam pembelajaran melalui kuliah
                                umum/webinar.
                            </p>
                        </div>

                        <!-- Kolaborasi 2 -->
                        <div class="bg-white p-8 rounded-lg shadow-md">
                            <div class="text-[#3D8FCF] text-5xl font-bold mb-4">2.</div>
                            <p class="text-gray-700 leading-relaxed">
                                Pelatihan penyuntingan tingkat dasar di proyek yang didukung melalui WikiLatih secara
                                tatap muka/daring.
                            </p>
                        </div>

                        <!-- Kolaborasi 3 -->
                        <div class="bg-white p-8 rounded-lg shadow-md">
                            <div class="text-[#3D8FCF] text-5xl font-bold mb-4">3.</div>
                            <p class="text-gray-700 leading-relaxed">
                                Kolaborasi data dan teknologi berupa kontribusi data maupun pereferensian data dari
                                repositori institusi ke Wikidata.
                            </p>
                        </div>

                    </div>

                    <!-- Contact Info Card -->
                    <div class="max-w-2xl mx-auto">
                        <div class="bg-[#4A76A8] rounded-2xl p-10 shadow-lg text-center">
                            <div class="text-6xl mb-4">✉️</div>
                            <h3 class="font-bold text-2xl text-white mb-3">Hubungi Kami</h3>
                            <a href="mailto:datateknologi@wikimedia.or.id" 
                               class="text-xl text-white hover:text-blue-100 transition-colors duration-200 font-medium">
                                datateknologi@wikimedia.or.id
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </AppLayout>
</template>

<style scoped>
/* Additional styles if needed */
</style>