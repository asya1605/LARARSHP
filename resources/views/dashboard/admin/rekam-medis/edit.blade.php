@extends('layouts.admin')

@section('title', 'Edit Rekam Medis - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white shadow-md rounded-xl p-8 w-full max-w-4xl border border-gray-200">
    <h2 class="text-lg font-bold text-[#002080] mb-4 text-center">✏️ Edit Rekam Medis</h2>

    <form method="POST" action="{{ route('admin.rekam-medis.update', $item->idrekam_medis) }}" class="grid md:grid-cols-2 gap-4">
      @csrf
      @method('PUT')

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Reservasi Dokter (ID)</label>
        <input type="number" name="idreservasi_dokter" value="{{ $item->idreservasi_dokter }}" class="w-full border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Nama Hewan</label>
        <select name="idpet" class="w-full border rounded-lg px-3 py-2" required>
          @foreach($pet as $p)
            <option value="{{ $p->idpet }}" {{ $p->idpet == $item->idpet ? 'selected' : '' }}>
              {{ $p->nama }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Dokter Pemeriksa</label>
        <select name="dokter_pemeriksa" class="w-full border rounded-lg px-3 py-2" required>
          @foreach($dokter as $d)
            <option value="{{ $d->iduser }}" {{ $d->iduser == $item->dokter_pemeriksa ? 'selected' : '' }}>
              {{ $d->username }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Anamnesa</label>
        <textarea name="anamnesa" class="w-full border rounded-lg px-3 py-2 h-20">{{ $item->anamnesa }}</textarea>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Temuan Klinis</label>
        <textarea name="temuan_klinis" class="w-full border rounded-lg px-3 py-2 h-20">{{ $item->temuan_klinis }}</textarea>
      </div>

      <div>
        <label class="block mb-1 text-sm font-semibold text-gray-700">Diagnosa</label>
        <textarea name="diagnosa" class="w-full border rounded-lg px-3 py-2 h-20">{{ $item->diagnosa }}</textarea>
      </div>

      <div class="md:col-span-2 flex justify-between mt-4">
        <a href="{{ route('admin.rekam-medis.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">← Batal</a>
        <button type="submit" class="bg-[#002080] hover:bg-[#00185e] text-white px-4 py-2 rounded text-sm font-medium">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</section>
@endsection
    