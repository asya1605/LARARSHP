<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan form login (bawaan Laravel UI)
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login berdasarkan tabel user, role_user, role
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek user dan role aktif
        $user = DB::table('user')
            ->join('role_user', 'user.iduser', '=', 'role_user.iduser')
            ->join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('user.*', 'role.nama_role as role')
            ->where('user.email', $request->email)
            ->where('role_user.status', 1)
            ->first();

        // Verifikasi password
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'iduser'    => $user->iduser,
                'nama'      => $user->nama,
                'email'     => $user->email,
                'role'      => strtolower($user->role),
                'logged_in' => true,
            ]);

            // Arahkan sesuai role
            switch (strtolower($user->role)) {
                case 'administrator':
                    return redirect()->route('dashboard.admin')->with('success', 'Login berhasil sebagai Administrator.');
                case 'dokter':
                    return redirect()->route('dashboard.dokter')->with('success', 'Login berhasil sebagai Dokter.');
                case 'perawat':
                    return redirect()->route('dashboard.perawat')->with('success', 'Login berhasil sebagai Perawat.');
                case 'pemilik':
                    return redirect()->route('dashboard.pemilik')->with('success', 'Login berhasil sebagai Pemilik.');
                default:
                    return redirect()->route('dashboard')->with('success', 'Login berhasil.');
            }
        }

        return back()->with('error', 'Email atau password salah!');
    }

    /**
     * Logout user dan hapus session.
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
