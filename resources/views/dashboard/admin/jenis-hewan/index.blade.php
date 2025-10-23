@extends('layouts.admin')

@section('title', 'Data Jenis Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">
  
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

  {{-- PAGE CONTAINER --}}
  <div class="max-w-6xl mx-auto px-6 mt-10">

    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">🐾 Data Jenis Hewan</h1>

    {{-- Flash Message --}}
    @foreach (['success' => 'green', 'danger' => 'red'] as $type => $color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center shadow-sm">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- Action bar --}}
    <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
      <a href="{{ route('admin.jenis-hewan.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg shadow-md transition text-sm font-medium inline-flex items-center justify-center gap-2">
         ➕ Tambah Jenis
      </a>

      <input type="text" id="search" placeholder="🔍 Cari jenis hewan..."
             class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-[#002080]/30 transition">
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white rounded-2xl shadow-md border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Nama Jenis Hewan</th>
            <th class="py-3 px-4 text-center w-52">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100">
          @forelse($list as $j)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4 font-medium text-gray-700">{{ $j->idjenis_hewan }}</td>
              <td class="py-3 px-4">{{ $j->nama_jenis_hewan }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.jenis-hewan.edit', $j->idjenis_hewan) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs font-medium transition">
                   ✏️ Ubah
                </a>
                <a href="{{ route('admin.jenis-hewan.destroy', $j->idjenis_hewan) }}"
                   onclick="return confirm('Yakin ingin menghapus jenis ini?')"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-medium transition ml-2">
                   🗑️ Hapus
                </a>
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

<script>
  // live search sederhana
  document.getElementById('search').addEventListener('keyup', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
</script>
@endsection
