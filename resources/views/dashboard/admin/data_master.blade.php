@extends('layouts.admin')

@section('title', 'Data Master - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
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

  {{-- TITLE --}}
  <div class="text-center pt-12 pb-6">
    <h1 class="text-2xl font-bold text-[#002080]">📂 Data Master RSHP</h1>
    <p class="text-gray-600 text-sm mt-2">Kelola seluruh data utama sistem Rumah Sakit Hewan Pendidikan Universitas Airlangga</p>
  </div>

  {{-- GRID CARD --}}
  <div class="max-w-6xl mx-auto pb-14 px-6 grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @php
    $data = [
        [
        'title' => 'Data User',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/3135/3135715.png',
        'url'   => route('admin.data-user.index'),
        ],
        [
        'title' => 'Manajemen Role',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/10691/10691841.png',
        'url'   => route('admin.role-user.index'),
        ],
        [
        'title' => 'Jenis Hewan',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/5312/5312800.png',
        'url'   => route('admin.jenis-hewan.index'),
        ],
        [
        'title' => 'Ras Hewan',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/672/672716.png',
        'url'   => route('admin.ras-hewan.index'),
        ],
        [
        'title' => 'Data Pemilik',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/1256/1256650.png',
        'url'   => route('admin.pemilik.index'),
        ],
        [
        'title' => 'Data Pet',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/1807/1807570.png',
        'url'   => route('admin.pet.index'),
        ],
        [
        'title' => 'Data Kategori',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/15302/15302080.png',
        'url'   => route('admin.kategori.index'),
        ],
        [
        'title' => 'Data Kategori Klinis',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/13637/13637200.png',
        'url'   => route('admin.kategori-klinis.index'),
        ],
        [
        'title' => 'Data Kode Tindakan Terapi',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/15887/15887652.png',
        'url'   => route('admin.kode-tindakan-terapi.index'),
        ],
        [
        'title' => 'Data Rekam Medis',
        'img'   => 'https://cdn-icons-png.flaticon.com/128/15887/15887652.png',
        'url'   => route('admin.rekam-medis.index'),
        ],
    ];
    @endphp

    @foreach ($data as $item)
    <a href="{{ $item['url'] }}" 
       class="group bg-white shadow-sm border border-gray-100 rounded-2xl p-6 text-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 block">
      <div class="flex justify-center mb-4">
        <div class="bg-[#002080]/10 rounded-full p-4 group-hover:bg-[#002080]/20 transition">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-12 h-12 object-contain">
        </div>
      </div>
      <h4 class="font-semibold text-[#002080] text-sm group-hover:text-[#00185e] transition">
        {{ $item['title'] }}
      </h4>
    </a>
    @endforeach
  </div>
</section>
@endsection
