<script setup>
import AppLayout from './Layout/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const programs = [
  {
    title: 'Kuliah Umum',
    description: 'Kuliah Umum Proyek Wikimedia adalah kegiatan berbagi pengetahuan yang memperkenalkan berbagai proyek Wikimedia—seperti Wikipedia, Wikidata, dan Wikimedia Commons—serta cara komunitas global berkolaborasi untuk menyediakan informasi bebas yang dapat diakses siapa saja.',
    image: '/program/kuliah_umum.jpg'
  },
  {
    title: 'Hibah Riset Wikidata',
    description: 'Hibah Riset Wikidata adalah program pendanaan dari Wikimedia Indonesia melalui Wikidata Indonesia untuk mendukung pengembangan teknologi data terbuka terhubung (linked open data) di Indonesia. Program ini membuka kesempatan bagi penelitian yang berkaitan dengan Wikidata, Wikipedia, proyek Wiki lainnya, maupun topik Data Terbuka Terhubung',
    image: '/program/hibah_riset_data.jpg'
  },
  {
    title: 'Pemagangan',
    description: 'Pemagangan adalah program pembelajaran berbasis praktik yang memberi kesempatan bagi peserta untuk mengenal dan berkontribusi langsung pada ekosistem Wikidata. Melalui kegiatan ini, peserta dapat mengembangkan keterampilan teknis, memahami konsep data terbuka terhubung, serta berkontribusi pada proyek-proyek teknologi Wikimedia dengan bimbingan dari tim Data dan Teknologi.',
    image: '/program/pemagangan.jpg'
  }
];
</script>

<template>
  <Head title="Akademik" />
  <AppLayout>
    <!-- Hero Section with Background Image -->
    <section class="relative w-full h-[350px] md:h-[400px] overflow-hidden">
      <!-- Background Image with Repeat -->
      <div 
        class="absolute inset-0 bg-repeat bg-center"
        style="background-image: url('/bg/bg-2.png'); background-size: auto;"
      >
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/55"></div>
      </div>

      <!-- Content Overlay -->
      <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-6 lg:px-8">
          <div class="max-w-5xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-5 leading-tight">
              Akademik
            </h1>
            <p class="text-sm md:text-base lg:text-lg text-white/90 leading-relaxed">
              Akademik merupakan kluster kegiatan yang diselenggarakan oleh Tim Data dan Teknologi yang dibangun melalui kerjasama dengan komunitas akademisi di perguruan tinggi. Saat ini kami menyelenggarakan tiga kegiatan.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Programs Section -->
    <section class="py-16 md:py-24 bg-white">
      <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          
          <!-- Program Card -->
          <div 
            v-for="(program, index) in programs" 
            :key="index"
            class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
          >
            <!-- Image -->
            <div class="w-full h-80 overflow-hidden">
              <img 
                :src="program.image" 
                :alt="program.title"
                class="w-full h-full object-cover"
              />
            </div>
            
            <!-- Content -->
            <div class="p-6">
              <h3 class="text-2xl font-bold text-[#006699] mb-4">
                {{ program.title }}
              </h3>
              <p class="text-gray-700 leading-relaxed">
                {{ program.description }}
              </p>
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