<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Ambil data user + role dengan JOIN
        $user = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('user.*', 'role.nama_role as role')
            ->where('user.email', $request->email)
            ->where('role_user.status', 1) // hanya role aktif
            ->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'email'     => $user->email,
                'role'      => strtolower($user->role),
                'logged_in' => true,
            ]);

            // Redirect sesuai role
            switch (strtolower($user->role)) {
                case 'administrator':
                    return redirect()->route('dashboard.admin')
                        ->with('success', 'Login berhasil sebagai Admin!');
                case 'dokter':
                    return redirect()->route('dashboard.dokter')
                        ->with('success', 'Login berhasil sebagai Dokter!');
                case 'perawat':
                    return redirect()->route('dashboard.perawat')
                        ->with('success', 'Login berhasil sebagai Perawat!');
                case 'pemilik':
                    return redirect()->route('dashboard.pemilik')
                        ->with('success', 'Login berhasil sebagai Pemilik!');
                default:
                    return redirect()->route('dashboard')
                        ->with('success', 'Login berhasil!');
            }
        }

        // Jika gagal login
        return back()->with('error', 'Email atau password salah!');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }

    /**
     * Tampilkan form register
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Proses pendaftaran user baru (otomatis login & redirect ke dashboard pemilik)
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan user baru ke tabel user
        $iduser = DB::table('user')->insertGetId([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ambil idrole untuk "pemilik"
        $role = DB::table('role')->where('nama_role', 'pemilik')->first();
        if ($role) {
            DB::table('role_user')->insert([
                'iduser' => $iduser,
                'idrole' => $role->idrole,
                'status' => 1,
            ]);
        }

        // Ambil data user untuk auto-login
        $user = DB::table('user')->where('iduser', $iduser)->first();

        // Simpan session
        session([
            'email'     => $user->email,
            'role'      => 'pemilik',
            'logged_in' => true,
        ]);

        // Redirect langsung ke dashboard pemilik
        return redirect()->route('dashboard.pemilik')->with('success', 'Selamat datang, akun Anda berhasil dibuat!');
    }
}
