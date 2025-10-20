@extends('layouts.admin')

@section('title', 'Nonaktifkan Role - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] flex justify-center items-center">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-gray-200">
    <h2 class="text-xl font-bold text-[#002080] mb-4 text-center">Nonaktifkan Role</h2>
    <p class="text-gray-700 text-center mb-6 leading-relaxed">
      Apakah kamu yakin ingin <strong class="text-red-600">menonaktifkan</strong> role ini untuk user?
    </p>

    <form method="POST" action="{{ route('admin.role-user.deactivateConfirm') }}" class="text-center">
      @csrf
      <input type="hidden" name="iduser" value="{{ $iduser }}">
      <input type="hidden" name="idrole" value="{{ $idrole }}">
      <div class="flex justify-center gap-4">
        <button type="submit" class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-lg transition text-sm font-medium">
          📴 Nonaktifkan
        </button>
        <a href="{{ route('admin.role-user.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg transition text-sm">
          Batal
        </a>
      </div>
    </form>
  </div>
</section>
@endsection
