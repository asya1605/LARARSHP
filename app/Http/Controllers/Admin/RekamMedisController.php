<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Pet;
use App\Models\User;

class RekamMedisController extends Controller
{
    public function index()
    {
        $data = RekamMedis::with(['pet.pemilik', 'dokter'])->orderByDesc('created_at')->get();
        return view('dashboard.admin.rekam_medis.index', compact('data'));
    }

    public function create()
    {
        $pet = Pet::all();
        $dokter = User::where('idrole', 3)->get(); // misal idrole=3 adalah dokter
        return view('dashboard.admin.rekam_medis.create', compact('pet', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required|integer',
            'idpet' => 'required|integer',
            'dokter_pemeriksa' => 'required|integer',
            'anamnesa' => 'nullable|string',
            'temuan_klinis' => 'nullable|string',
            'diagnosa' => 'nullable|string'
        ]);

        RekamMedis::create($request->all() + ['created_at' => now()]);

        return redirect()->route('admin.rekam_medis.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = RekamMedis::findOrFail($id);
        $pet = Pet::all();
        $dokter = User::where('idrole', 3)->get();

        return view('dashboard.admin.rekam_medis.edit', compact('item', 'pet', 'dokter'));
    }

    public function update(Request $request, $id)
    {
        $item = RekamMedis::findOrFail($id);

        $request->validate([
            'idreservasi_dokter' => 'required|integer',
            'idpet' => 'required|integer',
            'dokter_pemeriksa' => 'required|integer',
            'anamnesa' => 'nullable|string',
            'temuan_klinis' => 'nullable|string',
            'diagnosa' => 'nullable|string'
        ]);

        $item->update($request->all());
        return redirect()->route('admin.rekam_medis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        RekamMedis::destroy($id);
        return redirect()->route('admin.rekam_medis.index')->with('success', 'Data berhasil dihapus.');
    }
}
