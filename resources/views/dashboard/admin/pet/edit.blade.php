@extends('layouts.admin')

@section('title', 'Edit Pet - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-2xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Data Pet</h2>

    {{-- Error validasi --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Pesan sukses --}}
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-2 rounded mb-3 text-center">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.pet.update', $pet->idpet) }}" class="grid md:grid-cols-2 gap-4">
      @csrf

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Pet</label>
        <input type="text" name="nama" value="{{ old('nama', $pet->nama) }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pet->tanggal_lahir) }}" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Warna / Tanda</label>
        <input type="text" name="warna_tanda" value="{{ old('warna_tanda', $pet->warna_tanda) }}" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border rounded-lg px-3 py-2">
          <option value="M" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'M' ? 'selected' : '' }}>Jantan</option>
          <option value="F" {{ old('jenis_kelamin', $pet->jenis_kelamin) == 'F' ? 'selected' : '' }}>Betina</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Pemilik</label>
        <select name="idpemilik" required class="w-full border rounded-lg px-3 py-2">
          @foreach ($pemilikList as $p)
            <option value="{{ $p->idpemilik }}" {{ old('idpemilik', $pet->idpemilik) == $p->idpemilik ? 'selected' : '' }}>
              {{ $p->nama }} ({{ $p->email }})
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Ras Hewan</label>
        <select name="idras_hewan" required class="w-full border rounded-lg px-3 py-2">
          @foreach ($rasList as $r)
            <option value="{{ $r->idras_hewan }}" {{ old('idras_hewan', $pet->idras_hewan) == $r->idras_hewan ? 'selected' : '' }}>
              {{ $r->nama_ras }} - {{ $r->nama_jenis_hewan }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.pet.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
