@extends('layouts.admin')

@section('title', 'Edit User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center py-10">
  <div class="bg-white p-10 rounded-2xl shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">✏️ Edit Data User</h1>

    <form method="POST" action="{{ route('admin.data-user.update', $user->iduser) }}" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-1">Nama</label>
        <input type="text" name="nama" value="{{ $user->nama }}" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div class="flex justify-between items-center mt-6">
        <button class="bg-[#002080] text-white px-5 py-2 rounded-lg hover:bg-[#00185e] transition">Simpan</button>
        <a href="{{ route('admin.data-user.index') }}" class="text-gray-600 hover:underline">Batal</a>
      </div>
    </form>
  </div>
</section>
@endsection
