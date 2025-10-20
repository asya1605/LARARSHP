@extends('layouts.main')
@section('title', 'Lokasi RSHP Unair')
@section('content')
<section class="max-w-7xl mx-auto px-6 py-14 text-center">
  <h2 class="text-3xl font-bold text-[#002080] mb-8">Lokasi RSHP UNAIR</h2>
  <div class="flex flex-col md:flex-row items-center gap-8">
    <iframe class="w-full md:w-1/2 h-80 rounded-xl shadow-md"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7410075551015!2d112.78555967330813!3d-7.27028539273667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1755483986152!5m2!1sid!2sid"
        width="600" height="350" style="border:0;" allowfullscreen loading="lazy">
    </iframe>
    <div class="md:w-1/2 text-left">
      <h3 class="text-2xl font-semibold text-[#002080] mb-2">Alamat</h3>
      <p class="text-gray-600 leading-relaxed">
        <strong>RSHP Universitas Airlangga Kampus C</strong><br>
        Jl. Dharmahusada Permai, Mulyorejo, Surabaya
      </p>
    </div>
  </div>
</section>
@endsection
