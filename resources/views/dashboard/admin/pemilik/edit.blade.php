@extends('layouts.admin')

@section('title', 'Edit Pemilik - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Pemilik</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-3">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-2 rounded mb-3 text-center">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.pemilik.update', $pemilik->idpemilik) }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $pemilik->nama) }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $pemilik->email) }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">No. WhatsApp</label>
        <input type="text" name="no_wa" value="{{ old('no_wa', $pemilik->no_wa) }}" class="w-full border rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat</label>
        <textarea name="alamat" class="w-full border rounded-lg px-3 py-2" required>{{ old('alamat', $pemilik->alamat) }}</textarea>
      </div>

      <div class="flex justify-between">
        <a href="{{ route('admin.pemilik.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
