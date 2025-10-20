@extends('layouts.admin')

@section('title', 'Tambah User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center py-10">
  <div class="bg-white p-10 rounded-2xl shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold text-[#002080] mb-6 text-center">➕ Tambah User Baru</h1>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-5 text-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.data-user.store') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-semibold mb-1">Nama</label>
        <input type="text" name="nama" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1">Email</label>
        <input type="email" name="email" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1">Password</label>
        <input type="password" name="password" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div>
        <label class="block text-sm font-semibold mb-1">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="border rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-[#002080]/30" required>
      </div>
      <div class="flex justify-between items-center mt-6">
        <button class="bg-[#002080] text-white px-5 py-2 rounded-lg hover:bg-[#00185e] transition">Simpan</button>
        <a href="{{ route('admin.data-user.index') }}" class="text-gray-600 hover:underline">Batal</a>
      </div>
    </form>
  </div>
</section>
@endsection
