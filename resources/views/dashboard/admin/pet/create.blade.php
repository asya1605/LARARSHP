
@extends('layouts.admin')

@section('title', 'Tambah Pet - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-2xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">Tambah Pet</h2>

    <form method="POST" action="{{ route('admin.pet.store') }}" class="grid md:grid-cols-2 gap-4">
      @csrf

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Nama Pet</label>
        <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Warna/Tanda</label>
        <input type="text" name="warna_tanda" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border rounded-lg px-3 py-2">
          <option value="M">Jantan</option>
          <option value="F">Betina</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Pemilik</label>
        <select name="idpemilik" required class="w-full border rounded-lg px-3 py-2">
          <option value="">-- Pilih Pemilik --</option>
          @foreach($pemilikList as $p)
            <option value="{{ $p->idpemilik }}">{{ $p->nama }} ({{ $p->email }})</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Ras Hewan</label>
        <select name="idras_hewan" required class="w-full border rounded-lg px-3 py-2">
          <option value="">-- Pilih Ras --</option>
          @foreach($rasList as $r)
            <option value="{{ $r->idras_hewan }}">{{ $r->nama_ras }} - {{ $r->nama_jenis_hewan }}</option>
          @endforeach
        </select>
      </div>

      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.pet.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
