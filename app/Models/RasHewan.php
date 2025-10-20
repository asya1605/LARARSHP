<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RasHewan;
use App\Models\JenisHewan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasList = RasHewan::with('jenis')
                    ->orderBy('idjenis_hewan')
                    ->orderBy('nama_ras')
                    ->get();

        return view('dashboard.admin.ras_hewan.index', compact('rasList'));
    }

    public function create()
    {
        $jenisList = JenisHewan::orderBy('nama_jenis_hewan')->get();
        return view('dashboard.admin.ras_hewan.create', compact('jenisList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|integer|exists:jenis_hewan,idjenis_hewan',
        ]);

        RasHewan::create([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras_hewan.index')
                         ->with('success', 'Ras hewan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ras = RasHewan::findOrFail($id);
        $jenisList = JenisHewan::orderBy('nama_jenis_hewan')->get();
        return view('dashboard.admin.ras_hewan.edit', compact('ras', 'jenisList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ras' => 'required|string|max:100',
            'idjenis_hewan' => 'required|integer|exists:jenis_hewan,idjenis_hewan',
        ]);

        RasHewan::where('idras_hewan', $id)->update([
            'nama_ras' => $request->nama_ras,
            'idjenis_hewan' => $request->idjenis_hewan,
        ]);

        return redirect()->route('admin.ras_hewan.index')
                         ->with('success', 'Data ras hewan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $used = DB::table('pet')->where('idras_hewan', $id)->exists();
        if ($used) {
            return redirect()->route('admin.ras_hewan.index')
                             ->with('danger', 'Tidak dapat menghapus ras: masih digunakan pada data hewan.');
        }

        RasHewan::where('idras_hewan', $id)->delete();
        return redirect()->route('admin.ras_hewan.index')
                         ->with('success', 'Ras hewan berhasil dihapus.');
    }
}
