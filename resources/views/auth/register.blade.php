@extends('layouts.main')

@section('title', 'Daftar Akun RSHP Unair')

@section('content')
<section class="flex items-center justify-center min-h-[80vh] bg-gray-50">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md fade-in">
    <h2 class="text-2xl font-bold text-center text-[#002080] mb-6">Daftar Akun RSHP</h2>

    {{-- Alert pesan sukses/gagal --}}
    @if(session('success'))
      <p class="text-green-600 text-center mb-3">{{ session('success') }}</p>
    @endif
    @if($errors->any())
      <ul class="bg-red-50 text-red-600 text-sm p-3 rounded mb-4">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    @endif

    <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Masukkan nama lengkap..."
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#002080]/50 focus:border-[#002080] outline-none transition">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" placeholder="Masukkan email aktif..."
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#002080]/50 focus:border-[#002080] outline-none transition">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" placeholder="Masukkan password..."
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#002080]/50 focus:border-[#002080] outline-none transition">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" placeholder="Ulangi password..."
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#002080]/50 focus:border-[#002080] outline-none transition">
      </div>

      <button type="submit"
              class="w-full bg-[#002080] text-white font-semibold py-2 rounded-lg shadow hover:bg-[#001a66] transition">
        Daftar Sekarang
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="text-[#002080] font-semibold hover:underline">Masuk</a>
    </p>
  </div>
</section>
@endsection
