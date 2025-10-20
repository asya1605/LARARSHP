@extends('layouts.admin')

@section('title', 'Tambah Jenis Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-md border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">Tambah Jenis Hewan</h2>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-2 rounded mb-3">
        <ul class="list-disc ml-5 text-sm">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.jenis-hewan.store') }}" class="space-y-4">
      @csrf
      <input type="text" name="nama_jenis_hewan" placeholder="contoh: Kucing / Anjing / Kelinci"
             class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>

      <div class="flex justify-between">
        <a href="{{ route('admin.jenis-hewan.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Kembali</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
