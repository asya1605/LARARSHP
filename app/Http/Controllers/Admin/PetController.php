<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    /**
     * Menampilkan semua data Pet (join pemilik, ras, dan jenis)
     */
    public function index()
    {
        $pets = DB::table('pet')
            ->join('pemilik', 'pet.idpemilik', '=', 'pemilik.idpemilik')
            ->join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select(
                'pet.*',
                'pemilik.nama as nama_pemilik',
                'pemilik.email as email_pemilik',
                'ras_hewan.nama_ras',
                'jenis_hewan.nama_jenis_hewan'
            )
            ->orderBy('pet.nama')
            ->get();

        return view('dashboard.admin.pet.index', compact('pets'));
    }

    /**
     * Form tambah data Pet
     */
    public function create()
    {
        $pemilikList = DB::table('pemilik')->orderBy('nama')->get();
        $rasList = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('nama_ras')
            ->get();

        return view('dashboard.admin.pet.create', compact('pemilikList', 'rasList'));
    }

    /**
     * Simpan data baru Pet
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:M,F',
            'idpemilik' => 'required|integer|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|integer|exists:ras_hewan,idras_hewan',
        ]);

        DB::table('pet')->insert([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);

        return redirect()->route('admin.pet.index')->with('success', '🐶 Data Pet berhasil ditambahkan!');
    }

    /**
     * Form edit data Pet
     */
    public function edit($id)
    {
        $pet = DB::table('pet')->where('idpet', $id)->first();

        if (!$pet) {
            return redirect()->route('admin.pet.index')->with('danger', '❌ Data Pet tidak ditemukan.');
        }

        $pemilikList = DB::table('pemilik')->orderBy('nama')->get();
        $rasList = DB::table('ras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('ras_hewan.*', 'jenis_hewan.nama_jenis_hewan')
            ->orderBy('nama_ras')
            ->get();

        return view('dashboard.admin.pet.edit', compact('pet', 'pemilikList', 'rasList'));
    }

    /**
     * Update data Pet
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'warna_tanda' => 'nullable|string|max:255',
            'jenis_kelamin' => 'required|in:M,F',
            'idpemilik' => 'required|integer|exists:pemilik,idpemilik',
            'idras_hewan' => 'required|integer|exists:ras_hewan,idras_hewan',
        ]);

        DB::table('pet')->where('idpet', $id)->update([
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'warna_tanda' => $request->warna_tanda,
            'jenis_kelamin' => $request->jenis_kelamin,
            'idpemilik' => $request->idpemilik,
            'idras_hewan' => $request->idras_hewan,
        ]);

        return redirect()->route('admin.pet.index')->with('success', '✅ Data Pet berhasil diperbarui!');
    }

    /**
     * Hapus data Pet
     */
    public function destroy($id)
    {
        DB::table('pet')->where('idpet', $id)->delete();
        return redirect()->route('admin.pet.index')->with('success', '🗑️ Data Pet berhasil dihapus.');
    }
}
