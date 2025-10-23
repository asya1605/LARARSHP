@extends('layouts.admin')

@section('title', 'Dashboard Admin - RSHP UNAIR')

@section('content')
<section class="min-h-screen bg-gradient-to-b from-[#f8fbff] to-[#eef2ff]">

  {{-- NAVBAR ADMIN --}}
  <nav class="bg-[#002080] shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center gap-8 py-4 text-white font-medium">
      <a href="{{ route('dashboard.admin') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         🏠 <span>Home</span>
      </a>
      <a href="{{ route('dashboard.admin.data') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         📋 <span>Data Master</span>
      </a>
      <a href="{{ route('logout') }}" 
         class="flex items-center gap-2 text-red-300 hover:text-red-400 transition">
         🚪 <span>Logout</span>
      </a>
    </div>
  </nav>

  {{-- CONTENT SECTION --}}
  <div class="max-w-5xl mx-auto mt-16 px-6">
    <div class="bg-white shadow-lg rounded-2xl p-10 text-center border border-gray-100 hover:shadow-xl transition">
      <div class="flex justify-center mb-5">
        <div class="bg-[#002080]/10 p-4 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002080" class="w-10 h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3zm0 0v8m0 0H9m3 0h3" />
          </svg>
        </div>
      </div>
      <h1 class="text-3xl font-bold text-[#002080] mb-3">Halo, Admin! 🎉</h1>
      <p class="text-gray-600 leading-relaxed">
        Selamat datang di halaman <strong>Administrator RSHP Universitas Airlangga.</strong><br>
        Kelola data dan pantau aktivitas sistem dengan mudah melalui menu di atas.
      </p>
    </div>
</section>
@endsection
