<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisHewanController extends Controller
{
    public function index()
    {
        $list = JenisHewan::orderBy('nama_jenis_hewan')->get();
        return view('dashboard.admin.jenis-hewan.index', compact('list'));
    }

    public function create()
    {
        return view('dashboard.admin.jenis-hewan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan'
        ]);

        JenisHewan::create([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis = JenisHewan::findOrFail($id);
        return view('dashboard.admin.jenis-hewan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_hewan' => 'required|string|max:100|unique:jenis_hewan,nama_jenis_hewan,' . $id . ',idjenis_hewan'
        ]);

        JenisHewan::where('idjenis_hewan', $id)->update([
            'nama_jenis_hewan' => $request->nama_jenis_hewan
        ]);

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $used = DB::table('ras_hewan')->where('idjenis_hewan', $id)->exists();
        if ($used) {
            return redirect()->route('admin.jenis-hewan.index')
                             ->with('danger', 'Tidak dapat dihapus: masih digunakan pada tabel ras.');
        }

        JenisHewan::where('idjenis_hewan', $id)->delete();

        return redirect()->route('admin.jenis-hewan.index')
                         ->with('success', 'Jenis hewan berhasil dihapus.');
    }
}
