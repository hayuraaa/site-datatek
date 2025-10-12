<script setup>
import AppLayout from './Layout/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const programs = [
  {
    title: 'Datathon',
    description: 'Datathon adalah kompetisi penyuntingan data di Wikidata. Peserta menyunting, menambahkan, mengurangi atau memperbaiki butir di Wikidata. Datathon diselenggarakan secara rutin mengikuti tema kegiatan di kalender.',
    image: '/program/datathon.png'
  },
  {
    title: 'Kompetisi Penyajian Data',
    description: 'Kompetisi Penyajian Data merupakan kompetisi penyajian atau visualisasi data dari Wikidata. Kompetisi ini diselenggarakan oleh Wikimedia Indonesia. Dalam kompetisi ini, peserta mengolah data dan menyajikannya dalam bentuk karya visual yang kemudian diterbitkan dengan lisensi bebas di Wikimedia Commons.',
    image: '/program/penyajian_data.png'
  }
];
</script>

<template>
  <Head title="Kompetisi" />
  <AppLayout>
    <!-- Hero Section with Background Image -->
    <section class="relative w-full h-[350px] md:h-[400px] overflow-hidden">
      <!-- Background Image with Repeat -->
      <div 
        class="absolute inset-0 bg-repeat bg-center"
        style="background-image: url('/bg/bg-5.jpg'); background-size: auto;"
      >
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/55"></div>
      </div>

      <!-- Content Overlay -->
      <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-6 lg:px-8">
          <div class="max-w-5xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-5 leading-tight">
              Kompetisi
            </h1>
            <p class="text-sm md:text-base lg:text-lg text-white/90 leading-relaxed">
              Kompetisi merupakan kluster kegiatan yang diselenggarakan oleh Tim Data dan Teknologi yang berhubungan dengan kompetisi penyuntingan di Wikidata. Saat ini kami menyelenggarakan dua kegiatan.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Programs Section -->
    <section class="py-16 md:py-24 bg-white">
      <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
          
          <!-- Program Card -->
          <div 
            v-for="(program, index) in programs" 
            :key="index"
            class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
          >
            <!-- Image -->
            <div class="w-full h-[500px] overflow-hidden">
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