@extends('layouts.admin')
@section('title', 'Data Kategori')

@section('content')

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

  
<section class="min-h-[90vh] bg-[#f5f7ff]">
  <div class="max-w-5xl mx-auto py-10 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">📂 Data Kategori</h1>

    {{-- Alert message --}}
    @foreach(['success'=>'green','danger'=>'red'] as $type=>$color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- Tombol tambah --}}
    <div class="flex justify-end mb-5">
      <a href="{{ route('admin.kategori.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-semibold">
        ➕ Tambah Kategori
      </a>
    </div>

    {{-- Tabel data --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Nama Kategori</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($kategoriList as $k)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">{{ $k->idkategori }}</td>
              <td class="py-3 px-4">{{ $k->nama_kategori }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.kategori.edit', $k->idkategori) }}"
                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">✏️ Edit</a>
                <a href="{{ route('admin.kategori.destroy', $k->idkategori) }}"
                   onclick="return confirm('Hapus kategori ini?')"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">🗑️ Hapus</a>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-center py-5 text-gray-500 italic">Belum ada data kategori.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
