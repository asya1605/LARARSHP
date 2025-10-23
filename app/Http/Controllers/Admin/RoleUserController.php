<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // ✅ Tambahkan ini
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class RoleUserController extends Controller
{
    // 🟢 Menampilkan daftar user dan role mereka
    public function index()
    {
        $users = User::with(['roles'])->orderBy('nama')->get();
        $roles = Role::orderBy('nama_role')->get();

        return view('dashboard.admin.role-user.index', compact('users', 'roles'));
    }

    // 🟡 Tambah / assign role
    public function store(Request $request)
    {
        $request->validate([
            'iduser' => 'required',
            'idrole' => 'required',
        ]);

        $user = User::findOrFail($request->iduser);
        $role = Role::findOrFail($request->idrole);
        $isActive = $request->has('status') ? 1 : 0;

        // Jika aktif, nonaktifkan role lain user
        if ($isActive) {
            $user->roles()->updateExistingPivot($user->roles->pluck('idrole'), ['status' => 0]);
        }

        // Cek apakah user sudah punya role ini
        $user->roles()->syncWithoutDetaching([$role->idrole => ['status' => $isActive]]);

        return redirect()->route('admin.role-user.index')->with('success', 'Role berhasil ditambahkan atau diperbarui.');
    }

    // 🟢 Konfirmasi Jadikan Aktif
    public function setActive($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.set_active', compact('iduser', 'idrole'));
    }

    public function setActiveConfirm(Request $request)
    {
        $user = User::findOrFail($request->iduser);
        $user->roles()->updateExistingPivot($user->roles->pluck('idrole'), ['status' => 0]);
        $user->roles()->updateExistingPivot($request->idrole, ['status' => 1]);

        return redirect()->route('admin.role-user.index')->with('success', 'Role berhasil dijadikan aktif.');
    }

    // ⚫ Nonaktifkan
    public function deactivate($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.deactivate', compact('iduser', 'idrole'));
    }

    public function deactivateConfirm(Request $request)
    {
        // logika nonaktifkan role
        $iduser = $request->iduser;
        $idrole = $request->idrole;

        DB::table('role_user')
            ->where('iduser', $iduser)
            ->where('idrole', $idrole)
            ->update(['status' => 0]);

        return redirect()->route('admin.role-user.index')->with('success', 'Role berhasil dinonaktifkan.');
    }

    // 🔴 Hapus Role
    public function destroy($iduser, $idrole)
    {
        return view('dashboard.admin.role-user.destroy', compact('iduser', 'idrole'));
    }

    public function destroyConfirm(Request $request)
    {
        $user = User::findOrFail($request->iduser);
        $user->roles()->detach($request->idrole);

        return redirect()->route('admin.role-user.index')->with('danger', 'Role berhasil dihapus dari user.');
    }
}
