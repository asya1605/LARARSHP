@extends('layouts.main')

@section('title', 'Home - RSHP Unair')

@section('content')
<!-- ======== HERO SECTION ======== -->
<section class="max-w-7xl mx-auto px-6 py-14 flex flex-col md:flex-row items-center gap-10">
  <!-- Left: Info -->
  <div class="md:w-1/2 space-y-5">
    <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
         alt="Logo Universitas Airlangga RSHP"
         class="w-60 mx-auto md:mx-0">

    <h3 class="text-3xl font-bold text-[#002080] leading-snug">
      Rumah Sakit Hewan Pendidikan Universitas Airlangga
    </h3>
    <p class="text-gray-700 leading-relaxed">
      Berinovasi untuk selalu meningkatkan kualitas pelayanan.  
      RSHP Universitas Airlangga menyediakan fitur pendaftaran online  
      yang mempermudah Anda mendaftarkan hewan kesayangan.
    </p>

    <div class="flex flex-col sm:flex-row gap-3">
      <a href="#" class="bg-[#00BFA6] text-white px-5 py-2 rounded-lg shadow hover-up text-center">
        Reservasi Online
      </a>
        <a href="{{ url('/jadwal') }}"
         class="bg-[#FFD700] text-[#002080] px-5 py-2 rounded-lg shadow hover-up text-center">
         Jadwal Dokter Jaga
      </a>
    </div>
  </div>

  <!-- Right: Video -->
  <div class="md:w-1/2">
    <div class="rounded-xl overflow-hidden shadow-lg">
      <iframe class="w-full h-64 md:h-80"
              src="https://www.youtube.com/embed/rCfvZPECZvE"
              title="Profil RSHP UNAIR"
              allowfullscreen></iframe>
    </div>
  </div>
</section>
<!-- ======== /HERO SECTION ======== -->

<!-- ======== BERITA TERKINI SECTION ======== -->
<section class="max-w-7xl mx-auto px-6 py-14 relative">
  <h2 class="text-3xl font-bold text-center text-[#002080] mb-10 tracking-wide">
    📰 Berita Terkini
  </h2>

  <h3 class="text-xl font-semibold text-gray-800 mb-6">RSHP Latest News</h3>

  <!-- Container scroll horizontal -->
  <div class="relative">
    <!-- Tombol kiri -->
    <button id="btn-left"
            class="absolute left-0 top-1/2 -translate-y-1/2 bg-[#002080] text-white p-2 rounded-full shadow-md hover:bg-[#00154d]">
      &#10094;
    </button>

    <!-- Scroll area -->
    <div id="news-scroll"
         class="flex gap-6 overflow-x-auto scroll-smooth no-scrollbar px-10">
      <!-- CARD 1 -->
      <div class="min-w-[250px] bg-white rounded-xl shadow-md hover:shadow-lg hover-up overflow-hidden">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2025/06/26-Mei-2025.png"
             class="w-full h-48 object-cover">
        <div class="p-4">
          <h4 class="font-semibold text-[#002080] mb-1">Open Recruit Staf RSHP Unair</h4>
          <p class="text-sm text-gray-600">1 Juni 2025</p>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="min-w-[250px] bg-white rounded-xl shadow-md hover:shadow-lg hover-up overflow-hidden">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/11/Senam-8.jpg"
             class="w-full h-48 object-cover">
        <div class="p-4">
          <h4 class="font-semibold text-[#002080] mb-1">Tim Satu Sehat Juara 1 Senam Bugar Airlangga</h4>
          <p class="text-sm text-gray-600">4 November 2024</p>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="min-w-[250px] bg-white rounded-xl shadow-md hover:shadow-lg hover-up overflow-hidden">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/08/CueCard-SW-Sitologi-24-A5-21-x-14.8-cm-scaled-1060x450.webp"
             class="w-full h-48 object-cover">
        <div class="p-4">
          <h4 class="font-semibold text-[#002080] mb-1">Seminar & Workshop Sitologi RSHP 2024</h4>
          <p class="text-sm text-gray-600">27 Agustus 2024</p>
        </div>
      </div>

      <!-- CARD 4 -->
      <div class="min-w-[250px] bg-white rounded-xl shadow-md hover:shadow-lg hover-up overflow-hidden">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/08/AGT05378-fitur-gambar-scaled-1060x450.jpg"
             class="w-full h-48 object-cover">
        <div class="p-4">
          <h4 class="font-semibold text-[#002080] mb-1">RSHP Goes to Banyuwangi</h4>
          <p class="text-sm text-gray-600">5 Agustus 2024</p>
        </div>
      </div>

      <!-- CARD 5 -->
      <div class="min-w-[250px] bg-white rounded-xl shadow-md hover:shadow-lg hover-up overflow-hidden">
        <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/07/fiesta-urology-e1722057203203-720x450.jpg"
             class="w-full h-48 object-cover">
        <div class="p-4">
          <h4 class="font-semibold text-[#002080] mb-1">Seminar dan Workshop FIESTA UROLOGI</h4>
          <p class="text-sm text-gray-600">21 July 2024</p>
        </div>
      </div>
    </div>

    <!-- Tombol kanan -->
    <button id="btn-right"
            class="absolute right-0 top-1/2 -translate-y-1/2 bg-[#002080] text-white p-2 rounded-full shadow-md hover:bg-[#00154d]">
      &#10095;
    </button>
  </div>
</section>

<!-- Script slider -->
<script>
  const scrollContainer = document.getElementById('news-scroll');
  document.getElementById('btn-left').addEventListener('click', () => {
    scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
  });
  document.getElementById('btn-right').addEventListener('click', () => {
    scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
  });
</script>

<!-- Hapus scrollbar (utility kecil) -->
<style>
  .no-scrollbar::-webkit-scrollbar { display: none; }
  .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
<!-- ======== /BERITA TERKINI SECTION ======== -->

@endsection
