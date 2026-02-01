<script setup>
import AppLayout from './Layout/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const programs = [
  {
    title: 'WikiLatih Reguler',
    description: 'WikiLatih merupakan pelatihan penyuntingan proyek Wiki bagi masyarakat umum. Dalam pelatihan ini akan diajarkan mulai dari peraturan-peraturan yang berlaku di proyek-proyek Wiki seperti pemilihan referensi dan parafrasa, hingga praktik penyuntingan di butir Wikidata atau fungsi di Wikifunctions. Pelatihan ini bersifat gratis dan terbuka bagi siapa saja.',
    image: '/program/wikilatih_reguler.png'
  },
  {
    title: 'WikiLatih Daring',
    description: 'WikiLatih Daring adalah versi daring dari WikiLatih Reguler. WikiLatih Daring menawarkan fleksibilitas dalam pembelajaran. Kami menyesuaikan materi pembelajaran yang disampaikan secara luring, untuk disampaikan secara daring, dengan tetap menjaga komprehensi dan kedalaman materi pembelajaran.',
    image: '/program/wikilatih_daring.png'
  },
  {
    title: 'Kopdar',
    description: 'Kawan Wiki yang ingin berkumpul bersama untuk berbagi cerita dan menyunting Wikidata dapat mengikuti kegiatan Kopdar. Kegiatan santai untuk seluruh Kawan Wiki bercengkerama mengenal satu sama lain dan bertukar pikiran.',
    image: '/program/kopdar.png'
  },
  {
    title: 'Temu Daring',
    description: 'Sebuah alternatif dari kegiatan Kopdar ketika tidak dapat berjabat erat secara langsung. Temu Daring akan mempersatukan seluruh Kawan Wiki dari berbagai daerah dalam satu kesempatan yang sama untuk saling berbagi cerita di daerahnya.',
    image: '/program/temu_daring.png'
  }
];
</script>

<template>
  <Head title="Pengembangan Kapasitas" />
  <AppLayout>
    <!-- Hero Section with Background Image -->
    <section class="relative w-full h-[350px] md:h-[400px] overflow-hidden">
      <!-- Background Image with Repeat -->
      <div 
        class="absolute inset-0 bg-repeat bg-center"
        style="background-image: url('/bg/bg-1.jpg'); background-size: auto;"
      >
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/55"></div>
      </div>

      <!-- Content Overlay -->
      <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-6 lg:px-8">
          <div class="max-w-5xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-5 leading-tight">
              Pengembangan Kapasitas
            </h1>
            <p class="text-sm md:text-base lg:text-lg text-white/90 leading-relaxed">
              WikiLatih merupakan kegiatan pengenalan dan pelatihan penyuntingan berbagai proyek Wikimedia. 
              WikiLatih yang diselenggarakan oleh Tim Data dan Teknologi terdiri dari dua bentuk pelatihan, 
              yaitu WikiLatih Reguler dan WikiLatih Daring.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Programs Section -->
    <section class="py-16 md:py-24 bg-white">
      <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
          
          <!-- Program Card -->
          <div 
            v-for="(program, index) in programs" 
            :key="index"
            class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
          >
            <!-- Image -->
            <div class="w-full h-64 overflow-hidden">
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