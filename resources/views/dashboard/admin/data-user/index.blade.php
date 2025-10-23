@extends('layouts.admin')

@section('title', 'Data User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">

  {{-- NAVBAR ADMIN --}}
  <nav class="bg-[#002080] shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center gap-8 py-4 text-white font-medium">
      <a href="{{ route('dashboard.admin') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         🏠 <span>Home</span>
      </a>
      <a href="{{ route('dashboard.admin.data') }}" 
         class="flex items-center gap-2 hover:text-[#ffd700] transition">
         📋 <span>Data Master</span>
      </a>
      <a href="{{ route('logout') }}" 
         class="flex items-center gap-2 text-red-300 hover:text-red-400 transition">
         🚪 <span>Logout</span>
      </a>
    </div>
  </nav>

  {{-- PAGE CONTAINER --}}
  <div class="max-w-6xl mx-auto px-6 mt-10">
    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">📋 Data User</h1>

    {{-- Alerts --}}
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4 text-center shadow-sm">
        {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4 text-center shadow-sm">
        {{ session('error') }}
      </div>
    @endif

    {{-- Action bar --}}
    <div class="mb-6 flex flex-col sm:flex-row justify-between gap-4">
      <a href="{{ route('admin.data-user.create') }}"
         class="bg-[#002080] hover:bg-[#00185e] text-white px-5 py-2 rounded-lg shadow-md transition text-sm font-medium inline-flex items-center justify-center gap-2">
         ➕ Tambah User
      </a>
      <input type="text" id="search" placeholder="🔍 Cari nama atau email..."
             class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-1/3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-[#002080]/30 transition">
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-2xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4 text-center w-52">Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="divide-y divide-gray-100">
          @forelse($users as $u)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4 font-medium text-gray-700">{{ $u->iduser }}</td>
              <td class="py-3 px-4">{{ $u->nama }}</td>
              <td class="py-3 px-4">{{ $u->email }}</td>
              <td class="py-3 px-4 text-center">
                <a href="{{ route('admin.data-user.edit', $u->iduser) }}" 
                   class="text-blue-600 hover:text-blue-800 font-semibold transition">✏️ Edit</a>
                <span class="mx-2">|</span>
                <a href="{{ route('admin.data-user.reset', $u->iduser) }}"
                   class="text-red-600 hover:text-red-800 font-semibold transition"
                   onclick="return confirm('Reset password user ini ke 123456?')">🔄 Reset Password</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center py-5 text-gray-500">Belum ada data user.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  document.getElementById('search').addEventListener('keyup', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tableBody tr').forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
  });
</script>
@endsection
