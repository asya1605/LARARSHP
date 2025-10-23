@extends('layouts.admin')

@section('title', 'Manajemen Role User - RSHP UNAIR')

@section('content')
<section class="min-h-[90vh] bg-[#f5f7ff] pb-16">

  {{-- NAVBAR --}}
  <nav class="bg-[#002080] shadow-md">
    <div class="max-w-7xl mx-auto flex justify-center items-center gap-10 py-4 text-white font-medium text-[15px]">
      <a href="{{ route('dashboard.admin') }}" class="hover:text-[#ffd700] transition">🏠 Home</a>
      <a href="{{ route('dashboard.admin.data') }}" class="hover:text-[#ffd700] transition">📋 Data Master</a>
      <a href="{{ route('logout') }}" class="hover:text-red-300 transition">🚪 Logout</a>
    </div>
  </nav>

  {{-- PAGE CONTAINER --}}
  <div class="max-w-6xl mx-auto py-12 px-6">

    <h1 class="text-2xl font-bold text-[#002080] mb-8 text-center">⚙️ Manajemen Role User</h1>

    {{-- ALERT MESSAGE --}}
    @foreach (['success'=>'green','info'=>'blue','danger'=>'red'] as $type=>$color)
      @if(session($type))
        <div class="bg-{{ $color }}-100 border border-{{ $color }}-400 text-{{ $color }}-700 p-3 rounded mb-5 text-center shadow-sm">
          {{ session($type) }}
        </div>
      @endif
    @endforeach

    {{-- FORM TAMBAH ROLE --}}
    <div class="bg-white p-6 rounded-2xl shadow-md mb-10 border border-gray-200">
      <h2 class="text-lg font-semibold text-[#002080] mb-4 flex items-center gap-2">
        🧩 Tambah / Assign Role ke User
      </h2>

      <form action="{{ route('admin.role-user.store') }}" method="POST" class="space-y-5">
        @csrf
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
          <div>
            <label class="block mb-1 text-sm font-semibold text-gray-700">Pilih User</label>
            <select name="iduser" required class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-[#002080]/30 focus:outline-none">
              <option value="">-- pilih user --</option>
              @foreach($users as $u)
                <option value="{{ $u->iduser }}">{{ $u->nama }} ({{ $u->email }})</option>
              @endforeach
            </select>
          </div>

          <div>
            <label class="block mb-1 text-sm font-semibold text-gray-700">Pilih Role</label>
            <select name="idrole" required class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring-2 focus:ring-[#002080]/30 focus:outline-none">
              <option value="">-- pilih role --</option>
              @foreach($roles as $r)
                <option value="{{ $r->idrole }}">{{ $r->nama_role }}</option>
              @endforeach
            </select>
          </div>

          <div class="flex items-center mt-6 space-x-2">
            <input type="checkbox" name="status" class="w-4 h-4 accent-[#002080]">
            <span class="text-sm text-gray-700">Jadikan aktif</span>
          </div>
        </div>

        <div class="text-right">
          <button class="bg-[#002080] hover:bg-[#00185e] text-white px-6 py-2 rounded-lg text-sm font-medium shadow-md transition">
            💾 Simpan
          </button>
        </div>
      </form>
    </div>

    {{-- TABEL DATA --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-2xl border border-gray-200">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-[#002080] text-white uppercase text-xs">
          <tr>
            <th class="py-3 px-4">ID User</th>
            <th class="py-3 px-4">Nama</th>
            <th class="py-3 px-4">Email</th>
            <th class="py-3 px-4">Roles</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($users as $u)
            <tr class="hover:bg-gray-50 transition">
              <td class="py-3 px-4">{{ $u->iduser }}</td>
              <td class="py-3 px-4 font-medium text-gray-800">{{ $u->nama }}</td>
              <td class="py-3 px-4">{{ $u->email }}</td>
              <td class="py-3 px-4">
                @forelse($u->roles as $role)
                  <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-2 mb-2 border border-gray-200">
                    <div>
                      <span class="font-semibold text-gray-800">{{ $role->nama_role }}</span>
                      @if($role->pivot->status == 1)
                        <span class="ml-2 bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Aktif</span>
                      @else
                        <span class="ml-2 bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">Nonaktif</span>
                      @endif
                    </div>

                    <div class="flex gap-2">
                      @if($role->pivot->status == 0)
                        <a href="{{ route('admin.role-user.setActive', [$u->iduser, $role->idrole]) }}" class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded text-xs">Aktifkan</a>
                      @else
                        <a href="{{ route('admin.role-user.deactivate', [$u->iduser, $role->idrole]) }}" class="bg-gray-600 hover:bg-gray-700 text-white px-2 py-1 rounded text-xs">Nonaktifkan</a>
                      @endif
                      <a href="{{ route('admin.role-user.destroy', [$u->iduser, $role->idrole]) }}" onclick="return confirm('Yakin ingin menghapus role ini?')" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Hapus</a>
                    </div>
                  </div>
                @empty
                  <span class="text-gray-400 text-sm italic">Belum punya role</span>
                @endforelse
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data user.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
