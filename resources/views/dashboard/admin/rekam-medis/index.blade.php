@extends('layouts.admin')

@section('title', 'Data Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff]">
  <div class="bg-[#002080] text-white py-3 shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center items-center gap-10 font-semibold text-[15px] tracking-wide">
      <a href="{{ route('dashboard.admin') }}" class="hover:text-[#ffd700]">🏠 Home</a>
      <a href="{{ route('dashboard.admin.data') }}" class="hover:text-[#ffd700]">📋 Data Master</a>
      <a href="{{ route('logout') }}" class="hover:text-red-300">🚪 Logout</a>
    </div>
  </div>

  <div class="max-w-6xl mx-auto py-12 px-6">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">📄 Data Rekam Medis</h1>

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-5 text-center">
        {{ session('success') }}
      </div>
    @endif

    <div class="flex justify-end mb-5">
      <a href="{{ route('admin.rekam-medis.create') }}" 
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg text-sm font-medium">
        ➕ Tambah Rekam Medis
      </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">Tanggal</th>
            <th class="py-3 px-4">Nama Hewan</th>
            <th class="py-3 px-4">Pemilik</th>
            <th class="py-3 px-4">Dokter Pemeriksa</th>
            <th class="py-3 px-4">Diagnosa</th>
            <th class="py-3 px-4 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($data as $item)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
              <td class="py-3 px-4 font-semibold">{{ $item->pet->nama ?? '-' }}</td>
              <td class="py-3 px-4">{{ $item->pet->pemilik->nama ?? '-' }}</td>
              <td class="py-3 px-4">{{ $item->dokter->username ?? '-' }}</td>
              <td class="py-3 px-4">{{ $item->diagnosa ?? '-' }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.rekam-medis.edit', $item->idrekam_medis) }}" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs mr-2">Ubah</a>
                <form action="{{ route('admin.rekam-medis.destroy', $item->idrekam_medis) }}" 
                      method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus rekam medis ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-center py-5 text-gray-500">Belum ada data rekam medis.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
