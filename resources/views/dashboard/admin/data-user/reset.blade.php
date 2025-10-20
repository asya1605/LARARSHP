@extends('layouts.admin')

@section('title', 'Reset Password - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white p-10 rounded-2xl shadow-md text-center max-w-md">
    <h1 class="text-2xl font-bold text-[#002080] mb-4">🔒 Reset Password</h1>
    <div class="bg-green-100 text-green-700 p-4 rounded border border-green-300">
      <p>Password user berhasil direset ke <b>123456</b>.</p>
    </div>
    <a href="{{ route('admin.data-user.index') }}" class="inline-block mt-6 bg-[#002080] text-white px-5 py-2 rounded-lg hover:bg-[#00185e] transition">
      ← Kembali ke Data User
    </a>
  </div>
</section>
@endsection
