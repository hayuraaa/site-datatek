<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import AppLayout from './Layout/AppLayout.vue';
import ModalBanner from './Layout/ModalBanner.vue';
import { Link, Head } from '@inertiajs/vue3';

// Props untuk banner dan sliders
const props = defineProps({
  banners: Array,
  sliders: Array,
  dashboardUrl: {
    type: String,
    default: 'http://dashboard.wikimedia.or.id'
  }
});

const currentSlide = ref(0);

// Fungsi untuk mendapatkan URL gambar lengkap (sama seperti di ModalBanner)
const getImageUrl = (imagePath) => {
  if (!imagePath) return '';
  
  // Jika path sudah lengkap (http/https), gunakan langsung
  if (imagePath.startsWith('http')) {
    return imagePath;
  }
  
  // Jika path relatif, gabungkan dengan dashboard URL
  return `${props.dashboardUrl}/storage/${imagePath}`;
};

// Gunakan sliders dari database dengan URL yang benar
const slides = computed(() => {
  if (props.sliders && props.sliders.length > 0) {
    return props.sliders.map(slider => getImageUrl(slider.gambar));
  }
  // Fallback jika tidak ada slider dari database
  return [
    '/slider/1.jpg',
    '/slider/2.jpeg',
    '/slider/3.jpg'
  ];
});

let slideInterval = null;

const nextSlide = () => {
  currentSlide.value = (currentSlide.value + 1) % slides.value.length;
};

const scrollToProject = (e) => {
  e.preventDefault();
  const projectSection = document.getElementById('project');
  if (projectSection) {
    projectSection.scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    });
  }
};

onMounted(() => {
  slideInterval = setInterval(nextSlide, 5000);
});

onUnmounted(() => {
  if (slideInterval) {
    clearInterval(slideInterval);
  }
});
</script>

<template>
  <!-- Modal Banner -->
  <ModalBanner 
    v-if="banners && banners.length > 0" 
    :banners="banners"
    :dashboardUrl="dashboardUrl" />
  
  <AppLayout>
    <!-- Hero Section with Fullscreen Slider -->
    <section class="relative h-screen w-full overflow-hidden">
      <!-- Slides -->
      <div v-for="(slide, index) in slides" :key="index" :class="[
        'absolute inset-0 transition-opacity duration-1000',
        currentSlide === index ? 'opacity-100' : 'opacity-0'
      ]">
        <img 
          :src="slide" 
          :alt="`Slide ${index + 1}`" 
          class="w-full h-full object-cover"
          @error="(e) => e.target.src = '/slider/1.jpg'" />
      </div>

      <!-- Dark Overlay -->
      <div class="absolute inset-0 bg-black/50"></div>

      <!-- Text Content Overlay - Positioned Higher -->
      <div
        class="absolute inset-0 flex flex-col items-center justify-center px-8 md:px-16 text-center z-10 -mt-16 md:-mt-20">
        <h1 class="text-5xl md:text-6xl lg:text-6xl xl:text-7xl font-bold text-white mb-6 md:mb-8 leading-tight">
          Data dan Teknologi<br>Wikimedia Indonesia
        </h1>
        <p class="text-lg md:text-xl lg:text-2xl text-white/95 leading-relaxed max-w-4xl mb-10 md:mb-12">
          Program dari <a href="https://wikimedia.or.id" target="_blank"
            class="text-white/95 font-bold hover:underline">Wikimedia Indonesia</a> dengan misi utama memperkenalkan
          teknologi Wiki dan data terbuka, melalui Wikidata, Wikifunctions, dan MediaWiki.
        </p>

        <!-- CTA Button with Smooth Scroll -->
        <button @click="scrollToProject"
          class="inline-block px-6 py-2.5 bg-[#006699] hover:bg-[#005580] text-white text-base font-semibold rounded-full transition-all duration-300 hover:scale-105 shadow-xl cursor-pointer">
          Selengkapnya
        </button>
      </div>
    </section>

    <!-- Projects Section -->
    <section class="py-16 md:py-24 bg-gray-50" id="project">
      <div class="max-w-7xl mx-auto px-6 md:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-[#006699] mb-4">
            Proyek yang Didukung
          </h2>
          <p class="text-gray-600 text-lg max-w-4xl mx-auto leading-relaxed">
            Kami mendukung berbagai proyek kolaboratif yang berfokus pada pengembangan pengetahuan terbuka dan teknologi
            yang dapat diakses oleh siapa saja di seluruh dunia
          </p>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">

          <!-- Wikidata Card -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Wikidata</h3>
            <a href="https://www.wikidata.org/wiki/Wikidata:Main_Page" target="_blank" class="block">
              <img src="/logo-projek/3.png" alt="Wikidata" class="w-full h-48 object-contain mb-6 hover:scale-105 transition-transform duration-300">
            </a>
            <p class="text-gray-600 text-sm leading-relaxed text-center">
              Wikidata adalah sebuah basis pengetahuan sekunder yang bebas, kolaboratif, dan multibahasa. Wikidata
              berisi kumpulan data terstruktur yang disediakan sebagai dukungan untuk Wikipedia, Wikimedia Commons, dan
              proyek-proyek gerakan Wikimedia lainnya serta siapa saja di seluruh dunia.
            </p>
          </div>

          <!-- Wikifunctions Card -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Wikifunctions</h3>
            <a href="https://www.wikifunctions.org/wiki/Wikifunctions:Main_Page" target="_blank" class="block">
              <img src="/logo-projek/1.png" alt="Wikifunctions" class="w-full h-48 object-contain mb-6 hover:scale-105 transition-transform duration-300">
            </a>
            <p class="text-gray-600 text-sm leading-relaxed text-center">
              Wikifunctions adalah proyek Wikimedia yang memungkinkan semua orang untuk secara kolaboratif membuat dan
              memelihara perpustakaan fungsi kode guna mendukung proyek-proyek Wikimedia dan di luar itu, dalam bahasa
              alami dan bahasa pemrograman di seluruh dunia.
            </p>
          </div>

          <!-- MediaWiki Card -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">MediaWiki</h3>
            <a href="https://www.mediawiki.org/wiki/MediaWiki" target="_blank" class="block">
              <img src="/logo-projek/2.png" alt="MediaWiki" class="w-full h-48 object-contain mb-6 hover:scale-105 transition-transform duration-300">
            </a>
            <p class="text-gray-600 text-sm leading-relaxed text-center">
              MediaWiki digunakan oleh puluhan ribu situs web dan ribuan perusahaan serta organisasi. Perangkat lunak
              ini mendukung Wikipedia dan proyek Wikimedia lain. Perangkat lunak ini kuat, multibahasa, gratis dan
              terbuka, dapat diperluas, dapat disesuaikan, andal, dan tidak dikenakan biaya.
            </p>
          </div>

          <!-- Wikibase Card -->
          <div class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Wikibase</h3>
            <a href="https://wikiba.se/" target="_blank" class="block">
              <img src="/logo-projek/4.png" alt="Wikibase" class="w-full h-48 object-contain mb-6 hover:scale-105 transition-transform duration-300">
            </a>
            <p class="text-gray-600 text-sm leading-relaxed text-center">
              Wikibase adalah perangkat lunak yang menyediakan ruang kolaboratif untuk mengumpulkan, menyunting, dan
              mengkurasi informasi secara terstruktur. Wikibase efektif dalam membuka akses berbagi data untuk komputer
              dan manusia dalam multibahasa, menuju Data Terbuka Tertaut.
            </p>
          </div>

        </div>
      </div>
    </section>

    <!-- Partnership Section -->
    <section class="relative py-16 md:py-24 overflow-hidden">
      <!-- Background Image with Grayscale Effect -->
      <div class="absolute inset-0 grayscale" style="background-image: url('/bg/bg-1.jpg'); background-repeat: repeat;">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-white/85"></div>
      </div>

      <!-- Content -->
      <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-[#006699] mb-4">
            Kemitraan
          </h2>
          <p class="text-black text-lg max-w-4xl mx-auto leading-relaxed">
            Kami menyelenggarakan berbagai kegiatan untuk memperkuat komunitas, meningkatkan keterampilan, serta
            memperluas jangkauan pengetahuan bebas di Indonesia
          </p>
        </div>

        <!-- Partnership Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">

          <!-- Card 1 -->
          <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="border-l-4 border-[#006699] pl-4 mb-4">
              <p class="text-gray-700 leading-relaxed">
                Pelatihan maupun pengenalan khusus untuk proyek-proyek teknologi Wiki.
              </p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="border-l-4 border-[#006699] pl-4 mb-4">
              <p class="text-gray-700 leading-relaxed">
                Pelatihan penyuntingan dasar dan lanjutan di Wikidata untuk mendukung pengelolaan data terbuka.
              </p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="border-l-4 border-[#006699] pl-4 mb-4">
              <p class="text-gray-700 leading-relaxed">
                Pelatihan maupun pengenalan khusus untuk proyek-proyek teknologi Wiki.
              </p>
            </div>
          </div>

          <!-- Card 4 -->
          <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="border-l-4 border-[#006699] pl-4 mb-4">
              <p class="text-gray-700 leading-relaxed">
                Kegiatan yang berhubungan dengan Tri Dharma Perguruan Tinggi (penelitian, pengabdian, atau kajian
                ilmiah).
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Quote Section -->
    <section class="relative py-20 md:py-28 overflow-hidden">
      <!-- Background Image -->
      <div class="absolute inset-0">
        <img src="/bg/bg-2.png" alt="Background Quote" class="w-full h-full object-cover" />
        <!-- Overlay -->
        <div class="absolute inset-0 bg-white/80"></div>
      </div>

      <!-- Quote Content -->
      <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-8 text-center -mt-8 md:-mt-12">
        <div class="mb-6">
          <span class="text-6xl md:text-7xl text-black-400">❝</span>
        </div>
        <blockquote class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 italic leading-relaxed">
          Bayangkan suatu dunia tempat setiap manusia bisa berbagi beragam pengetahuan secara bebas
        </blockquote>
      </div>
    </section>

    <!-- Activities Section -->
    <section class="py-16 md:py-24 bg-gray-50">
      <div class="max-w-7xl mx-auto px-6 md:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16">
          <h2 class="text-3xl md:text-4xl font-bold text-[#006699] mb-4">
            Kegiatan Kami
          </h2>
          <p class="text-gray-600 text-lg max-w-4xl mx-auto leading-relaxed">
            Berbagai kegiatan yang kami lakukan bertujuan untuk mendukung penyebaran pengetahuan bebas melalui
            pelatihan, pertemuan komunitas, dan kerja sama dengan berbagai pihak.
          </p>
        </div>

        <!-- Activities Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">

          <!-- WikiLatih Card -->
          <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="h-64 overflow-hidden">
              <img src="/program/Wikilatih_Wikidata_Bersama_SKK_Ganto_UNP_di_Padang_3.webp" alt="WikiLatih"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-4">WikiLatih</h3>
              <p class="text-gray-600 leading-relaxed">
                Meskipun kami tidak memiliki otoritas atas konten di Wikipedia, kami dapat membantu Anda memahami
                Wikipedia dengan lebih baik melalui WikiLatih Wikidata.
              </p>
            </div>
          </div>

          <!-- Kopdar Card -->
          <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="h-64 overflow-hidden">
              <img src="/program/20240607_Kopdar_Sukarelawan_di_Pontianak-1.webp" alt="Kopdar"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-4">Kopdar</h3>
              <p class="text-gray-600 leading-relaxed">
                Kami mendukung komunitas-komunitas Wikimedia di Indonesia menyelenggarakan kegiatan berkumpul untuk
                menyunting bersama dalam agenda Kopdar.
              </p>
            </div>
          </div>

          <!-- Penjangkauan Card -->
          <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="h-64 overflow-hidden">
              <img src="/program/1717074179165.jpeg" alt="Penjangkauan"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
            </div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-4">Penjangkauan</h3>
              <p class="text-gray-600 leading-relaxed">
                Kami bekerja sama dengan berbagai pihak untuk menyebarluaskan pengetahuan secara bebas, termasuk
                instansi pendidikan, komunitas, media, dan lainnya.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Community Section -->
    <section class="bg-[#006699] py-16 md:py-24">
      <div class="max-w-7xl mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">

          <!-- Left Column - Image -->
          <div class="order-2 lg:order-1">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/4/40/Foto_Bersama_WikiNusantara_2023_%28diedit%29.png"
              alt="Komunitas Wikidata Indonesia" class="w-full h-auto rounded-lg shadow-2xl" />
          </div>

          <!-- Right Column - Content -->
          <div class="order-1 lg:order-2 text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
              Komunitas Wikidata Indonesia
            </h2>

            <p class="text-lg leading-relaxed mb-6">
              Komunitas Wikidata Indonesia adalah komunitas kontributor Wikidata di Indonesia. Kami bekerjasama untuk
              berkontribusi menambahkan butir-butir yang berkaitan dengan topik Indonesia secara umum. Selain itu, kami
              juga berfokus pada penerjemahan butir-butir Wikidata lain ke dalam bahasa Indonesia.
            </p>

            <p class="text-lg leading-relaxed mb-6">
              Tim Data dan Teknologi Wikimedia Indonesia berupaya mendukung perkembangan komunitas kontributor Wikidata
              di Indonesia.
            </p>

            <p class="text-lg leading-relaxed mb-8">
              Bergabunglah dengan komunitas yang mendukung kesetaraan pengetahuan untuk sesama. Mari Bebaskan
              Pengetahuan!
            </p>

            <a href="https://id.wikimedia.org/wiki/Komunitas_Wikidata_Indonesia"
              class="inline-block text-white underline font-semibold text-lg hover:underline">
              Pelajari lebih lanjut →
            </a>
          </div>

        </div>
      </div>
    </section>

  </AppLayout>
</template>

<style scoped>
/* Custom styles if needed */
</style>