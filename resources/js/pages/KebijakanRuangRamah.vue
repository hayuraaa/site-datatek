<script setup>
import AppLayout from './Layout/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Kebijakan Ruang Ramah" />
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
              Kebijakan Ruang Ramah
            </h1>
            <p class="text-sm md:text-base lg:text-lg text-white/90 leading-relaxed">
              Komunitas Wikimedia berdedikasi untuk memberikan pengalaman yang ramah bagi semua orang, tanpa memandang jenis kelamin, orientasi seksual, identitas gender atau ekspresi, disabilitas, penampilan, ras, agama, atau pilihan lisensi bebas (dan tidak terbatas pada aspek-aspek tersebut).
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 md:py-24 bg-white">
      <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center max-w-7xl mx-auto">
          
          <!-- Left Column - Text Content -->
          <div class="order-2 lg:order-1">
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
              Kebijakan ruang ramah acara adalah panduan pertemuan komunitas Wikimedia untuk mendorong terciptanya pengalaman yang positif dan membangun bagi seluruh peserta. Komunitas Wikimedia berdedikasi untuk memberikan pengalaman yang ramah bagi semua orang, tanpa memandang jenis kelamin, orientasi seksual, identitas gender atau ekspresi, disabilitas, penampilan, ras, agama, atau pilihan lisensi bebas (dan tidak terbatas pada aspek-aspek tersebut).
            </p>
            <p class="text-gray-700 leading-relaxed text-lg">
              Kami tidak memberikan toleransi atas pelecehan yang terjadi di acara yang diselenggarakan oleh Wikimedia Indonesia. Siapa pun yang melanggar peraturan ini dapat diminta untuk meninggalkan acara tersebut.
            </p>
          </div>

          <!-- Right Column - Image -->
          <div class="order-1 lg:order-2">
            <img 
              src="/program/kebijakan-ruang-ramah.jpg" 
              alt="Kebijakan Ruang Ramah" 
              class="w-full h-auto rounded-lg shadow-lg"
            />
          </div>

        </div>
      </div>
    </section>

    <!-- Definisi Pelecehan Section -->
    <section 
      class="relative py-16 md:py-24 overflow-hidden bg-cover bg-center"
      style="background-image: url('/bg/bg-3.jpg');"
    >

      <!-- Content -->
      <div class="relative z-10 container mx-auto px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Definisi pelecehan
          </h2>
          
          <p class="text-white text-lg mb-6">
            Yang termasuk kategori pelecehan, sebagai berikut:
          </p>

          <ul class="space-y-4 text-white text-lg list-disc list-outside ml-6">
            <li class="leading-relaxed">
              Komentar verbal yang menyinggung hal-hal yang berhubungan dengan gender, orientasi seksual, identitas gender atau ekspresi, disabilitas, penampilan fisik, ukuran tubuh, ras, suku, afiliasi politik, atau agama;
            </li>
            <li class="leading-relaxed">
              Intimidasi yang disengaja, menguntit, mengikuti orang lain tanpa seizinnya, pelecehan melalui foto atau rekaman, mengganggu pembicaraan atau acara lainnya;
            </li>
            <li class="leading-relaxed">
              Menampilkan konten-konten seksual yang tidak kontekstual, melakukan kontak fisik yang tidak sesuai pada tempatnya, dan menyoroti aktivitas seksual yang tidak diinginkan;
            </li>
            <li class="leading-relaxed">
              Perilaku lainnya yang tidak secara eksplisit dibahas di atas, tetapi dapat ditafsirkan sebagai bentuk tindakan yang tidak disukai dan tidak masuk akal.
            </li>
          </ul>

          <p class="text-white text-lg mt-8">
            Peserta yang diminta untuk menghentikan perilaku tersebut diharapkan dapat mematuhinya.
          </p>
        </div>
      </div>
    </section>

    <!-- Konten yang Berpotensi Menyinggung Section -->
    <section class="py-16 md:py-24 bg-gray-50">
      <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center max-w-7xl mx-auto">
          
          <!-- Left Column - Image -->
          <div class="flex justify-center items-center">
            <img 
              src="/program/Untitled.png" 
              alt="Konten yang berpotensi menyinggung" 
              class="w-full h-auto max-w-md"
            />
          </div>

          <!-- Right Column - Text Content -->
          <div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
              Konten yang berpotensi menyinggung
            </h2>
            <p class="text-gray-700 leading-relaxed text-lg mb-6">
              Gambar dan media lain yang mungkin menyinggung, menyusahkan, atau mengganggu orang lain tidak boleh ditampilkan dalam konferensi dan acara, kecuali saat konten tersebut terkait langsung dengan topik yang berhubungan dengan Wikimedia. Selain itu, peserta harus diberi informasi dengan jelas sebelum konten ditampilkan.
            </p>
            <p class="text-gray-700 leading-relaxed text-lg">
              Beberapa contoh konten semacam itu mencakup gambar yang menunjukkan ketelanjangan, konten seksual, kekerasan, atau gambar medis. Perhatian yang sama juga harus dilakukan ketika menggambarkan orang pribumi yang telah meninggal, tidak hanya dengan citra, tetapi juga dalam rekaman teks atau audio, yang harus dihindari jika memungkinkan.
            </p>
          </div>

        </div>
      </div>
    </section>

    <!-- Tindakan Pencegahan Section -->
    <section 
      class="relative py-16 md:py-24 overflow-hidden bg-cover bg-center"
      style="background-image: url('/bg/bg-3.jpg');"
    >
      <!-- Content -->
      <div class="relative z-10 container mx-auto px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
          <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Tindakan pencegahan
          </h2>
          
          <p class="text-white text-lg leading-relaxed mb-6">
            Acara komunitas Wikimedia dikelola oleh sukarelawan dan/atau staf Wikimedia Indonesia, penyelenggara acara juga mengharapkan bantuan dan dukungan dari semua peserta dalam mempertahankan kebijakan ruang ramah acara ini. Jika Anda mengalami pelecehan, melihat orang lain mengalami pelecehan, atau memiliki masalah lain, segera hubungi panitia.
          </p>

          <p class="text-white text-lg leading-relaxed">
            Jika panitia khawatir akan perilaku seseorang atau menerima keluhan dari peserta, panitia akan mengambil tindakan yang sesuai dengan situasi pada saat itu. Tindakan tersebut dapat berupa peringatan secara personal maupun meminta orang yang bersangkutan untuk meninggalkan tempat acara. Panitia dengan senang hati membantu peserta untuk menghubungi pihak keamanan tempat acara atau penegak hukum setempat, memberikan pendampingan, atau membantu orang-orang yang mengalami pelecehan agar merasa aman selama acara berlangsung.
          </p>
        </div>
      </div>
    </section>

  </AppLayout>
</template>

<style scoped>
/* Additional styles if needed */
</style>