<script setup>
import { ref } from 'vue';
import AppLayout from './Layout/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    materiList: Array, 
});

// Accordion states - dynamically create based on materiList
const accordionStates = ref(
    props.materiList.reduce((acc, media, index) => {
        acc[media.id] = index === 0; // First item open by default
        return acc;
    }, {})
);

const toggleAccordion = (id) => {
    accordionStates.value[id] = !accordionStates.value[id];
};
</script>

<template>
    <Head title="Media" />
    <AppLayout>
        <!-- Hero Section with Background Image -->
        <section class="relative w-full h-[350px] md:h-[400px] overflow-hidden">
            <!-- Background Image with Repeat -->
            <div class="absolute inset-0 bg-repeat bg-center"
                style="background-image: url('/bg/bg-3.jpg'); background-size: auto;">
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-black/55"></div>
            </div>

            <!-- Content Overlay -->
            <div class="relative z-10 h-full flex items-center">
                <div class="container mx-auto px-6 lg:px-8">
                    <div class="max-w-5xl">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-5 leading-tight">
                            Media & Materi
                        </h1>
                        <p class="text-sm md:text-base lg:text-lg text-white/90 leading-relaxed">
                            Halaman Media ini menyajikan berbagai video pembelajaran, presentasi, dokumen, dan materi lainnya yang dapat membantu Anda memahami lebih dalam mengenai proyek-proyek Wikimedia di Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Media Section with Accordion - Dynamic from Database -->
        <section v-if="materiList && materiList.length > 0" class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="max-w-5xl mx-auto">
                    <!-- Section Header -->
                    <h2 class="text-3xl md:text-4xl font-bold text-[#006699] mb-4">
                        Koleksi Media
                    </h2>
                    <p class="text-gray-700 leading-relaxed text-lg mb-12">
                        Koleksi video pembelajaran, presentasi, dan dokumen untuk membantu Anda memahami proyek-proyek Wikimedia Indonesia.
                    </p>

                    <!-- Accordion Items - Dynamic -->
                    <div class="space-y-4">
                        <div v-for="(media, index) in materiList" :key="media.id" 
                            class="border border-gray-200 rounded-lg overflow-hidden bg-white shadow-sm hover:shadow-md transition-shadow">
                            
                            <!-- Accordion Header -->
                            <button @click="toggleAccordion(media.id)"
                                class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-50 transition-colors">
                                <div class="flex items-center gap-3 flex-1">
                                    <!-- Title Only -->
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ media.judul }}
                                    </h3>
                                </div>
                                <!-- Toggle Icon -->
                                <svg :class="['w-5 h-5 text-[#006699] transition-transform duration-200 flex-shrink-0 ml-2', accordionStates[media.id] ? 'rotate-180' : '']"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Accordion Content -->
                            <div v-show="accordionStates[media.id]" class="px-6 pb-6">
                                <!-- Keterangan/Description -->
                                <p v-if="media.keterangan" class="text-gray-600 mb-4 text-sm leading-relaxed">
                                    {{ media.keterangan }}
                                </p>
                                
                                <!-- Media Player - Conditional rendering based on media type -->
                                
                                <!-- YouTube Video -->
                                <div v-if="media.jenis_media === 'youtube'" class="aspect-video w-full">
                                    <iframe class="w-full h-full rounded-lg"
                                        :src="media.embed_url"
                                        :title="media.judul" 
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>

                                <!-- Google Slides Presentation -->
                                <div v-else-if="media.jenis_media === 'google_slides'">
                                    <div class="w-full rounded-lg overflow-hidden" style="height: 500px;">
                                        <iframe
                                            :src="media.embed_url"
                                            class="w-full h-full"
                                            frameborder="0"
                                            allowfullscreen="true"
                                            mozallowfullscreen="true"
                                            webkitallowfullscreen="true"></iframe>
                                    </div>
                                    <!-- Download/Open Link Button -->
                                    <div class="mt-4">
                                        <a :href="media.url_media" 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-[#006699] hover:bg-[#005580] text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            Buka di Tab Baru
                                        </a>
                                    </div>
                                </div>

                                <!-- Google Docs -->
                                <div v-else-if="media.jenis_media === 'google_docs'">
                                    <div class="w-full rounded-lg overflow-hidden" style="height: 600px;">
                                        <iframe
                                            :src="media.embed_url"
                                            class="w-full h-full"></iframe>
                                    </div>
                                    <!-- Download/Open Link Button -->
                                    <div class="mt-4">
                                        <a :href="media.url_media" 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-[#006699] hover:bg-[#005580] text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            Buka di Tab Baru
                                        </a>
                                    </div>
                                </div>

                                <!-- Wikimedia Commons PDF -->
                                <div v-else-if="media.jenis_media === 'wikimedia_commons'">
                                    <!-- Desktop: Show PDF Embed -->
                                    <div class="hidden md:block w-full rounded-lg overflow-hidden border border-gray-200" style="height: 600px;">
                                        <embed
                                            :src="media.embed_url"
                                            type="application/pdf"
                                            class="w-full h-full"
                                        />
                                    </div>
                                    <!-- Mobile: Show Download Button -->
                                    <div class="md:hidden">
                                        <a :href="media.url_media" 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="flex items-center justify-center gap-2 w-full px-6 py-4 bg-[#006699] hover:bg-[#005580] text-white font-medium rounded-lg transition-colors duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Buka PDF
                                        </a>
                                    </div>
                                    <!-- Desktop: Download/Open Link Button -->
                                    <div class="hidden md:block mt-4">
                                        <a :href="media.url_media" 
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-[#006699] hover:bg-[#005580] text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            Buka di Tab Baru
                                        </a>
                                    </div>
                                </div>

                                <!-- Fallback for other media types -->
                                <div v-else class="aspect-video w-full bg-gray-100 rounded-lg flex items-center justify-center">
                                    <div class="text-center text-gray-500">
                                        <p>Media tidak dapat ditampilkan</p>
                                        <a :href="media.url_media" target="_blank" class="text-[#006699] hover:underline mt-2 inline-block">
                                            Buka di tab baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Empty State -->
        <section v-else class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <svg class="w-24 h-24 mx-auto mb-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Media</h3>
                    <p class="text-gray-600">Media dan materi pembelajaran akan segera tersedia.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gradient-to-r from-[#006699] to-[#005580]">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="max-w-4xl mx-auto text-center text-white">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">
                        Butuh Bantuan atau Materi Tambahan?
                    </h2>
                    <p class="text-lg md:text-xl mb-8 text-white/90">
                        Hubungi kami untuk mendapatkan panduan lebih lanjut atau request materi pembelajaran khusus.
                    </p>
                    <a 
                        href="/kontak"
                        class="inline-block px-8 py-4 bg-white text-[#006699] rounded-xl font-semibold hover:shadow-xl hover:scale-105 transition-all duration-300"
                    >
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </section>

    </AppLayout>
</template>

<style scoped>
/* Additional styles if needed */
</style>