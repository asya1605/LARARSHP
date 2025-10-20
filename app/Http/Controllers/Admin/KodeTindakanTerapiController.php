<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KodeTindakanTerapi;
use App\Models\Kategori;
use App\Models\KategoriKlinis;

class KodeTindakanTerapiController extends Controller
{
    public function index()
    {
        $data = KodeTindakanTerapi::with(['kategori', 'kategoriKlinis'])->get();
        return view('dashboard.admin.kode-tindakan-terapi.index', compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $kategori_klinis = KategoriKlinis::all();
        return view('dashboard.admin.kode-tindakan-terapi.create', compact('kategori', 'kategori_klinis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer'
        ]);

        KodeTindakanTerapi::create($request->all());

        return redirect()->route('admin.kode-tindakan-terapi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = KodeTindakanTerapi::findOrFail($id);
        $kategori = Kategori::all();
        $kategori_klinis = KategoriKlinis::all();

        return view('dashboard.admin.kode-tindakan-terapi.edit', compact('item', 'kategori', 'kategori_klinis'));
    }

    public function update(Request $request, $id)
    {
        $item = KodeTindakanTerapi::findOrFail($id);

        $request->validate([
            'kode' => 'required|string|max:50',
            'deskripsi_tindakan_terapi' => 'required|string|max:255',
            'idkategori' => 'required|integer',
            'idkategori_klinis' => 'required|integer'
        ]);

        $item->update($request->all());
        return redirect()->route('admin.kode-tindakan-terapi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KodeTindakanTerapi::destroy($id);
        return redirect()->route('admin.kode-tindakan-terapi.index')->with('success', 'Data berhasil dihapus.');
    }
}
