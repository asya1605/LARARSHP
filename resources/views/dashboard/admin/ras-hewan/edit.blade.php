@extends('layouts.admin')

@section('title', 'Edit Ras Hewan - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] py-10">
  <div class="max-w-lg mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-200">
    <h2 class="text-xl font-bold text-[#002080] mb-6 text-center">✏️ Edit Ras Hewan</h2>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.ras-hewan.update', $ras->idras_hewan) }}" method="POST" class="space-y-5">
      @csrf

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Ras Hewan</label>
        <input type="text" name="nama_ras" value="{{ old('nama_ras', $ras->nama_ras) }}" class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-[#002080]/30" required>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Hewan</label>
        <select name="idjenis_hewan" required class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-[#002080]/30">
          @foreach($jenisList as $j)
            <option value="{{ $j->idjenis_hewan }}" {{ $j->idjenis_hewan == $ras->idjenis_hewan ? 'selected' : '' }}>
              {{ $j->nama_jenis_hewan }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('admin.ras-hewan.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">⬅️ Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-6 py-2 rounded-lg">Update</button>
      </div>
    </form>
  </div>
</section>
@endsection
 