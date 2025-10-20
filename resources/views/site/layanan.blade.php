@extends('layouts.main')

@section('title', 'Layanan Umum - RSHP Unair')

@section('content')
<section class="max-w-6xl mx-auto px-6 py-14 leading-relaxed text-gray-700">
  <h2 class="text-3xl font-bold text-[#002080] text-center mb-10 fade-in">Layanan Umum RSHP Universitas Airlangga</h2>

  <p class="text-center max-w-3xl mx-auto mb-12 fade-in delay-100">
    Rumah Sakit Hewan Pendidikan Universitas Airlangga melakukan berbagai layanan,
    baik atas kehendak klien maupun rujukan dokter hewan praktisi, dengan fasilitas modern
    dan tenaga medis profesional.
  </p>

  {{-- ====== POLIKLINIK ====== --}}
  <div class="mb-14 fade-in">
    <div class="flex items-center gap-3 mb-4">
      <img src="https://cdn-icons-png.flaticon.com/128/2968/2968946.png" alt="Poliklinik"
           class="w-10 h-10 transition-transform duration-300 hover:rotate-12 hover:scale-110">
      <h3 class="text-2xl font-semibold text-[#002080]">Poliklinik</h3>
    </div>
    <p class="mb-4">
      Poliklinik adalah layanan rawat jalan dimana pelayanan kesehatan hewan dilakukan tanpa pasien menginap.
      Melayani tindakan observasi, diagnosis, pengobatan, rehabilitasi medik, serta pelayanan kesehatan lainnya seperti surat keterangan sehat.
      Pemeriksaan dapat mencakup sitologi, dermatologi, hematologi, radiologi, ultrasonografi, hingga elektrokardiografi.
      Bila diperlukan, pemeriksaan lanjutan dilakukan bekerja sama dengan Fakultas Kedokteran Hewan Universitas Airlangga.
    </p>
    <p class="mb-4">
      Kami juga menyediakan rapid test untuk penyakit berbahaya pada hewan seperti panleukopenia, calicivirus,
      rhinotracheitis, FIP pada kucing, serta parvovirus dan canine distemper pada anjing.
    </p>

    <h4 class="font-semibold text-gray-800 mt-6 mb-2">Layanan kesehatan hewan di poliklinik antara lain:</h4>
    <ul class="grid sm:grid-cols-2 md:grid-cols-3 gap-2 list-disc list-inside">
      <li>Rawat jalan</li>
      <li>Vaksinasi</li>
      <li>Akupuntur</li>
      <li>Kemoterapi</li>
      <li>Fisioterapi</li>
      <li>Mandi terapi</li>
    </ul>
  </div>

  {{-- ====== RAWAT INAP ====== --}}
  <div class="mb-14 fade-in delay-200">
    <div class="flex items-center gap-3 mb-4">
      <img src="https://cdn-icons-png.flaticon.com/128/2749/2749678.png" alt="Rawat Inap"
           class="w-10 h-10 transition-transform duration-300 hover:rotate-12 hover:scale-110">
      <h3 class="text-2xl font-semibold text-[#002080]">Rawat Inap</h3>
    </div>
    <p>
      Rawat inap dilakukan untuk pasien dengan kondisi berat atau membutuhkan perawatan intensif.
      Pasien akan diobservasi dan dirawat di bawah pengawasan dokter serta paramedis yang handal.
      Sebelum rawat inap, klien wajib mengisi <em>informed consent</em> dan akan diberi penjelasan
      lengkap tentang kondisi pasien, rencana terapi, serta biaya layanan. RSHP menerima
      pembayaran tunai maupun kartu debit.
    </p>
  </div>

  {{-- ====== BEDAH ====== --}}
  <div class="mb-14 fade-in delay-300">
    <div class="flex items-center gap-3 mb-4">
      <img src="https://cdn-icons-png.flaticon.com/128/15090/15090889.png" alt="Bedah"
           class="w-10 h-10 transition-transform duration-300 hover:rotate-12 hover:scale-110">
      <h3 class="text-2xl font-semibold text-[#002080]">Tindakan Bedah</h3>
    </div>
    <div class="ml-2">
      <h4 class="font-semibold text-gray-800 mt-4 mb-1">Bedah Minor:</h4>
      <ul class="list-disc list-inside space-y-1">
        <li>Jahit luka</li>
        <li>Kastrasi</li>
        <li>Othematoma</li>
        <li>Scaling – root planning</li>
        <li>Ekstraksi gigi</li>
      </ul>

      <h4 class="font-semibold text-gray-800 mt-6 mb-1">Bedah Mayor:</h4>
      <ul class="list-disc list-inside space-y-1">
        <li>Gastrotomi, Entrotomi, Enterektomi, Salivary mucocele</li>
        <li>Ovariohisterektomi, Sectio caesar, Piometra</li>
        <li>Sistotomi, Urethrostomi</li>
        <li>Fraktur tulang</li>
        <li>Hernia diafragmatika, perinealis, inguinalis</li>
        <li>Eksisi tumor</li>
      </ul>
    </div>
  </div>

  {{-- ====== PEMERIKSAAN ====== --}}
  <div class="mb-14 fade-in delay-400">
    <div class="flex items-center gap-3 mb-4">
      <img src="https://cdn-icons-png.flaticon.com/128/1934/1934474.png" alt="Pemeriksaan"
           class="w-10 h-10 transition-transform duration-300 hover:rotate-12 hover:scale-110">
      <h3 class="text-2xl font-semibold text-[#002080]">Pemeriksaan</h3>
    </div>
    <ul class="list-disc list-inside space-y-1 ml-2">
      <li>Pemeriksaan Sitologi</li>
      <li>Pemeriksaan Dermatologi</li>
      <li>Pemeriksaan Hematologi</li>
      <li>Pemeriksaan Radiografi</li>
      <li>Pemeriksaan Ultrasonografi</li>
    </ul>
  </div>

  {{-- ====== GROOMING ====== --}}
  <div class="mb-8 fade-in delay-500">
    <div class="flex items-center gap-3 mb-4">
      <img src="https://cdn-icons-png.flaticon.com/128/823/823990.png" alt="Grooming"
           class="w-10 h-10 transition-transform duration-300 hover:rotate-12 hover:scale-110">
      <h3 class="text-2xl font-semibold text-[#002080]">Grooming</h3>
    </div>
    <p>
      Selain layanan medis, RSHP Universitas Airlangga juga menyediakan layanan grooming
      bagi hewan kesayangan Anda, dilakukan oleh tenaga berpengalaman dengan memperhatikan
      kenyamanan dan kebersihan hewan secara menyeluruh.
    </p>
  </div>
</section>

{{-- ==== ANIMASI SCROLL ==== --}}
<script>
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('show');
    });
  }, { threshold: 0.2 });

  document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
</script>

<style>
  .fade-in { opacity: 0; transform: translateY(20px); transition: all 0.7s ease; }
  .fade-in.show { opacity: 1; transform: translateY(0); }
  .delay-100 { transition-delay: 0.1s; }
  .delay-200 { transition-delay: 0.2s; }
  .delay-300 { transition-delay: 0.3s; }
  .delay-400 { transition-delay: 0.4s; }
  .delay-500 { transition-delay: 0.5s; }
</style>
@endsection
