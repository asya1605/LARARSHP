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
        $data = RekamMedis::with(['pet'])->get();
        return view('dashboard.admin.rekam-medis.index', compact('data'));
    }

    public function create()
    {
        $pet = Pet::all();
        $dokter = User::whereHas('roles', function ($q) {
            $q->where('idrole', 3); // ambil user yang punya role dokter
        })->get();

        return view('dashboard.admin.rekam-medis.create', compact('pet', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idreservasi_dokter' => 'required|integer',
            'idpet' => 'required|integer',
            'diagnosa' => 'required|string|max:255',
            'terapi' => 'required|string|max:255',
        ]);

        RekamMedis::create($request->all());
        return redirect()->route('admin.rekam-medis.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $item = RekamMedis::findOrFail($id);
        $pet = Pet::all();
        $dokter = User::whereHas('roles', function ($q) {
            $q->where('role_user.idrole', 3); // ✅ tambahkan nama tabel pivot
        })->get();

        return view('dashboard.admin.rekam-medis.edit', compact('item', 'pet', 'dokter'));
}

    public function update(Request $request, $id)
    {
        $item = RekamMedis::findOrFail($id);

        $request->validate([
            'idpet' => 'required|integer',
            'dokter_pemeriksa' => 'required|integer',
            'anamnesa' => 'nullable|string',
            'temuan_klinis' => 'nullable|string',
            'diagnosa' => 'required|string|max:255',
        ]);

        $item->update([
            'idpet' => $request->idpet,
            'dokter_pemeriksa' => $request->dokter_pemeriksa,
            'anamnesa' => $request->anamnesa,
            'temuan_klinis' => $request->temuan_klinis,
            'diagnosa' => $request->diagnosa,
        ]);

        return redirect()->route('admin.rekam-medis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        RekamMedis::destroy($id);
        return redirect()->route('admin.rekam-medis.index')->with('danger', 'Data berhasil dihapus.');
    }
}
