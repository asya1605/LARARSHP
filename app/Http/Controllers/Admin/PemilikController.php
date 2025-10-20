<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    /** Tampilkan semua data pemilik */
    public function index()
    {
        $pemilikList = DB::table('pemilik')
            ->select('idpemilik', 'nama', 'email', 'no_wa', 'alamat')
            ->orderBy('nama')
            ->get();

        return view('dashboard.admin.pemilik.index', compact('pemilikList'));
    }

    /** Form tambah pemilik */
    public function create()
    {
        return view('dashboard.admin.pemilik.create');
    }

    /** Simpan data baru */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:pemilik,email',
            'password' => 'required|min:5',
            'no_wa' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($validated) {
                $idpemilik = DB::table('pemilik')->insertGetId([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                    'no_wa' => $validated['no_wa'],
                    'alamat' => $validated['alamat'],
                ]);

                // Pastikan role 'Pemilik' ada
                $role = DB::table('role')->where('nama_role', 'Pemilik')->first();
                if (!$role) {
                    $idrole = DB::table('role')->insertGetId(['nama_role' => 'Pemilik']);
                } else {
                    $idrole = $role->idrole;
                }

                // Buat user baru di tabel user
                $iduser = DB::table('user')->insertGetId([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                ]);

                // Assign role ke user
                DB::table('role_user')->insert([
                    'iduser' => $iduser,
                    'idrole' => $idrole,
                    'status' => 1,
                ]);
            });

            return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik baru berhasil ditambahkan.');
        } catch (\Throwable $e) {
            return back()->withErrors(['error' => 'Gagal menambahkan data: ' . $e->getMessage()]);
        }
    }

    /** Form edit */
    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('idpemilik', $id)->first();
        if (!$pemilik) {
            return redirect()->route('admin.pemilik.index')->with('danger', 'Data tidak ditemukan.');
        }

        return view('dashboard.admin.pemilik.edit', compact('pemilik'));
    }

    /** Update data */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'no_wa' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        try {
            DB::table('pemilik')->where('idpemilik', $id)->update($validated);
            return redirect()->route('admin.pemilik.index')->with('success', 'Data pemilik berhasil diperbarui.');
        } catch (\Throwable $e) {
            return back()->withErrors(['error' => 'Gagal update: ' . $e->getMessage()]);
        }
    }

    /** Hapus data */
    public function destroy($id)
    {
        try {
            $cek = DB::table('pet')->where('idpemilik', $id)->count();
            if ($cek > 0) {
                return back()->with('danger', "Tidak bisa dihapus. Masih dipakai di $cek data pet.");
            }

            DB::table('pemilik')->where('idpemilik', $id)->delete();
            return back()->with('success', 'Data pemilik berhasil dihapus.');
        } catch (\Throwable $e) {
            return back()->with('danger', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
