@extends('layouts.main')

@section('title', 'Jadwal Dokter Jaga - RSHP Unair')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-14 text-center">
  <h2 class="text-3xl font-bold text-[#002080] mb-8">Jadwal Dokter Jaga</h2>
  <p class="text-gray-600 mb-10 text-lg">Periode: <span class="font-semibold">Senin – Jumat, 2024</span></p>

  <div class="grid md:grid-cols-2 gap-10">
    <!-- Kolom 1 -->
    <div class="bg-white shadow-lg rounded-2xl p-5">
      <h3 class="text-xl font-bold text-[#002080] mb-3">Senin</h3>
      <table class="w-full text-left border-collapse">
        <tbody class="text-gray-700">
          <tr><td>Prof. Dr. I. Komang Wiarsa Sardjana, drh.</td><td class="text-right">08.30 – 12.00</td></tr>
          <tr><td>Dr. Miyayu S. Sofyan, Drh., M.Vet.</td><td class="text-right">08.30 – 16.30</td></tr>
          <tr><td>Drh. Lina Susanti, MS., Ph.D.</td><td class="text-right">13.00 – 16.30</td></tr>
          <tr><td>Dr. Donny Chrismanto, drh., MS.</td><td class="text-right">18.00 – 21.30</td></tr>
          <tr><td>Simeon Marcellino Tantono, drh.</td><td class="text-right">23.00 – 07.00</td></tr>
        </tbody>
      </table>

      <hr class="my-5 border-gray-200">

      <h3 class="text-xl font-bold text-[#002080] mb-3">Selasa</h3>
      <table class="w-full text-left border-collapse">
        <tbody class="text-gray-700">
          <tr><td>Prof. Dr. Wiwik Misaco Yuniarti, drh., M.Kes.</td><td class="text-right">08.30 – 16.30</td></tr>
          <tr><td>Dr. Ira Sari Yudaniayanti, drh., M.P.</td><td class="text-right">08.30 – 12.00</td></tr>
          <tr><td>Simeon Marcellino Tantono, drh.</td><td class="text-right">15.00 – 23.00</td></tr>
          <tr><td>Dr. Donny Chrismanto, drh., MS.</td><td class="text-right">18.00 – 21.30</td></tr>
          <tr><td>Puruh Renzy Amdalia, drh.</td><td class="text-right">23.00 – 07.00</td></tr>
        </tbody>
      </table>

      <hr class="my-5 border-gray-200">

      <h3 class="text-xl font-bold text-[#002080] mb-3">Rabu</h3>
      <table class="w-full text-left border-collapse">
        <tbody class="text-gray-700">
          <tr><td>Lianny Nangoi, drh., M.Kes.</td><td class="text-right">08.30 – 12.00</td></tr>
          <tr><td>Dr. Ira Sari Yudaniayanti, drh., M.P.</td><td class="text-right">08.30 – 16.30</td></tr>
          <tr><td>Abihilal Zikra Taim, drh.</td><td class="text-right">15.00 – 23.00</td></tr>
          <tr><td>Dr. Donny Chrismanto, drh., MS.</td><td class="text-right">18.00 – 21.30</td></tr>
          <tr><td>Puruh Renzy Amdalia, drh.</td><td class="text-right">23.00 – 07.00</td></tr>
        </tbody>
      </table>
    </div>

    <!-- Kolom 2 -->
    <div class="bg-white shadow-lg rounded-2xl p-5">
      <h3 class="text-xl font-bold text-[#002080] mb-3">Kamis</h3>
      <table class="w-full text-left border-collapse">
        <tbody class="text-gray-700">
          <tr><td>Dr. Nusdianto Triakoso, drh., M.P.</td><td class="text-right">08.30 – 16.30</td></tr>
          <tr><td>Drh. Lina Susanti, MS., Ph.D.</td><td class="text-right">08.30 – 12.00</td></tr>
          <tr><td>Drh. Mirza Atikah Madarina Hisyam, M.Si.</td><td class="text-right">13.00 – 16.30</td></tr>
          <tr><td>Puruh Renzy Amdalia, drh.</td><td class="text-right">15.00 – 23.00</td></tr>
          <tr><td>Abihilal Zikra Taim, drh.</td><td class="text-right">23.00 – 07.00</td></tr>
        </tbody>
      </table>

      <hr class="my-5 border-gray-200">

      <h3 class="text-xl font-bold text-[#002080] mb-3">Jumat</h3>
      <table class="w-full text-left border-collapse">
        <tbody class="text-gray-700">
          <tr><td>Dr. Boedi Setiawan, drh., M.P.</td><td class="text-right">08.30 – 12.00</td></tr>
          <tr><td>Dr. Miyayu Soneta Sofyan, drh., M.Vet.</td><td class="text-right">08.30 – 12.00</td></tr>
          <tr><td>Drh. Mirza Atikah Madarina Hisyam, M.Si.</td><td class="text-right">13.00 – 16.30</td></tr>
          <tr><td>Dr. Donny Chrismanto, drh., MS.</td><td class="text-right">13.00 – 16.30</td></tr>
          <tr><td>Puruh Renzy Amdalia, drh.</td><td class="text-right">15.00 – 23.00</td></tr>
          <tr><td>Abihilal Zikra Taim, drh.</td><td class="text-right">23.00 – 07.00</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
