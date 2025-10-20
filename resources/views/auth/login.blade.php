@extends('layouts.main')

@section('title', 'Login - RSHP Universitas Airlangga')

@section('content')
<section class="flex items-center justify-center min-h-[80vh] bg-gray-50">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md fade-in">
    <h2 class="text-2xl font-bold text-center text-[#002080] mb-6">Login RSHP</h2>

    {{-- pesan sukses / error --}}
    @if(session('success'))
      <p class="bg-green-100 text-green-700 px-4 py-2 rounded-md text-center mb-3">
        {{ session('success') }}
      </p>
    @endif
    @if(session('error'))
      <p class="bg-red-100 text-red-700 px-4 py-2 rounded-md text-center mb-3">
        {{ session('error') }}
      </p>
    @endif

    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" name="email" placeholder="Masukkan email..."
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#002080]/50 focus:border-[#002080] outline-none transition" required>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" placeholder="Masukkan password..."
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#002080]/50 focus:border-[#002080] outline-none transition" required>
      </div>

      <button type="submit"
        class="w-full bg-[#002080] text-white font-semibold py-2 rounded-lg shadow hover:bg-[#001a66] transition">
        Masuk
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Belum punya akun?
      <a href="{{ Route::has('register') ? route('register') : '#' }}" 
         class="text-[#002080] font-semibold hover:underline">
         Daftar sekarang
      </a>
    </p>
  </div>
</section>
@endsection

