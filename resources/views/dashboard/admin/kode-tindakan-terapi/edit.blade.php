@extends('layouts.admin')

@section('title', 'Edit Kode Tindakan Terapi - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-3xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Kode Tindakan Terapi</h2>

<form method="POST" action="{{ route('admin.kode-tindakan-terapi.update', $item->idkode_tindakan_terapi) }}" class="grid md:grid-cols-2 gap-4">
      @csrf
      @method('PUT')

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Kode</label>
        <input type="text" name="kode" value="{{ $item->kode }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div class="md:col-span-2">
        <label class="block mb-1 text-sm font-semibold text-gray-700">Deskripsi</label>
        <input type="text" name="deskripsi_tindakan_terapi" value="{{ $item->deskripsi_tindakan_terapi }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Kategori</label>
        <select name="idkategori" class="w-full border rounded-lg px-3 py-2">
          @foreach($kategori as $k)
            <option value="{{ $k->idkategori }}" {{ $item->idkategori == $k->idkategori ? 'selected' : '' }}>
              {{ $k->nama_kategori }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Kategori Klinis</label>
        <select name="idkategori_klinis" class="w-full border rounded-lg px-3 py-2">
          @foreach($kategori_klinis as $kk)
            <option value="{{ $kk->idkategori_klinis }}" {{ $item->idkategori_klinis == $kk->idkategori_klinis ? 'selected' : '' }}>
              {{ $kk->nama_kategori_klinis }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.kode-tindakan-terapi.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
