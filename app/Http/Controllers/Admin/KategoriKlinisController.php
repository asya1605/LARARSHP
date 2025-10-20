<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriKlinisController extends Controller
{
    public function index()
    {
        $kategoriList = DB::table('kategori_klinis')
            ->select('idkategori_klinis', 'nama_kategori_klinis')
            ->orderBy('nama_kategori_klinis')
            ->get();

        return view('dashboard.admin.kategori-klinis.index', compact('kategoriList'));
    }

    public function create()
    {
        return view('dashboard.admin.kategori-klinis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|unique:kategori_klinis,nama_kategori_klinis',
        ]);

        DB::table('kategori_klinis')->insert([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori Klinis berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori_klinis')->where('idkategori_klinis', $id)->first();
        if (!$kategori) {
            return redirect()->route('admin.kategori-klinis.index')->with('danger', 'Data tidak ditemukan.');
        }

        return view('dashboard.admin.kategori-klinis.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori_klinis' => 'required|string|max:100|unique:kategori_klinis,nama_kategori_klinis,' . $id . ',idkategori_klinis',
        ]);

        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->update([
            'nama_kategori_klinis' => $request->nama_kategori_klinis,
        ]);

        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori Klinis berhasil diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('kategori_klinis')->where('idkategori_klinis', $id)->delete();
        return redirect()->route('admin.kategori-klinis.index')->with('success', 'Kategori Klinis berhasil dihapus!');
    }
}
