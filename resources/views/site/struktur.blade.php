@extends('layouts.main')

@section('title', 'Struktur Organisasi - RSHP Unair')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-14 text-center">
  <h2 class="text-3xl font-bold text-[#002080] mb-10">Struktur Organisasi</h2>

  <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-10 justify-items-center">
    <!-- DIREKTUR -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover-up w-full max-w-sm">
      <div class="h-72 w-full overflow-hidden">
        <img src="https://unair.ac.id/wp-content/uploads/2024/04/Direktur-RSHP.webp"
             alt="Direktur RSHP"
             class="w-full h-full object-cover object-top">
      </div>
      <div class="p-5">
        <h4 class="text-xl font-bold text-[#002080]">Direktur</h4>
        <p class="text-gray-700 mt-1 font-medium">Dr. Ira Sari Yudaniayanti</p>
      </div>
    </div>

    <!-- WAKIL DIREKTUR I -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover-up w-full max-w-sm">
      <div class="h-72 w-full overflow-hidden">
        <img src="data:image/webp;base64,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"
             alt="Wakil Direktur I"
             class="w-full h-full object-cover object-top">
      </div>
      <div class="p-5">
        <h4 class="text-xl font-bold text-[#002080]">Wakil Direktur I</h4>
        <p class="text-gray-700 mt-1 font-medium">Pelayanan Medis, Pendidikan dan Penelitian</p>
        <p class="text-gray-700">Dr. Nusdianto Triakoso, M.P., drh.</p>
      </div>
    </div>

    <!-- WAKIL DIREKTUR II -->
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover-up w-full max-w-sm">
      <div class="h-72 w-full overflow-hidden">
        <img src="https://e-journal.unair.ac.id/public/site/images/admin/197602222015043201-1625241368.jpg"
             alt="Wakil Direktur II"
             class="w-full h-full object-cover object-top">
      </div>
      <div class="p-5">
        <h4 class="text-xl font-bold text-[#002080]">Wakil Direktur II</h4>
        <p class="text-gray-700 mt-1 font-medium">Sumber Daya Manusia, Sarana Prasarana dan Keuangan</p>
        <p class="text-gray-700">Dr. Miyayu Soneta S., M.Vet., drh.</p>
      </div>
    </div>
  </div>
</section>
@endsection
