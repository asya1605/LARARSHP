@extends('layouts.admin')

@section('title', 'Data Jenis Hewan - RSHP UNAIR')

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

    {{-- Flash Message --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    <div class="flex justify-end mb-4">
      <a href="{{ route('admin.jenis-hewan.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-medium">
         ➕ Tambah Jenis
      </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Nama Jenis Hewan</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($list as $j)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">{{ $j->idjenis_hewan }}</td>
              <td class="py-3 px-4 font-medium text-gray-800">{{ $j->nama_jenis_hewan }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.jenis-hewan.edit', $j->idjenis_hewan) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs mr-2">Ubah</a>
                <a href="{{ route('admin.jenis-hewan.destroy', $j->idjenis_hewan) }}"
                   onclick="return confirm('Yakin ingin menghapus jenis ini?')"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">Hapus</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-center py-5 text-gray-500">Belum ada data jenis hewan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection

