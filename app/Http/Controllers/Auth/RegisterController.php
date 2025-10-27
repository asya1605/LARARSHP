<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan form register
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Proses register user baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan user baru
        $iduser = DB::table('user')->insertGetId([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ambil role 'pemilik' dari tabel role
        $role = DB::table('role')->where('nama_role', 'pemilik')->first();

        if ($role) {
            DB::table('role_user')->insert([
                'iduser' => $iduser,
                'idrole' => $role->idrole,
                'status' => 1,
            ]);
        }

        // Auto login
        session([
            'iduser'    => $iduser,
            'email'     => $request->email,
            'role'      => 'pemilik',
            'logged_in' => true,
        ]);

        return redirect()->route('dashboard.pemilik')->with('success', 'Akun berhasil dibuat dan login otomatis!');
    }
}
