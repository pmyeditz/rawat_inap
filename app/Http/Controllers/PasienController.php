<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kamar;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $pasiens = Pasien::with(['kamar', 'tenagaMedis'])->get();
        return view('medis.pasien', compact('pasiens'));
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'    => 'required|string|max:100',
            'alamat'          => 'required|string',
            'usia'            => 'required|integer|min:0',
            'no_telp'         => 'nullable|string|max:20',
            'jenis_penyakit'  => 'nullable|string',
            'id_kamar'        => 'nullable|exists:kamars,id_kamar',
            'id_medis'        => 'nullable|exists:tenaga_medis,id_medis',
            'tanggal_masuk'   => 'required|date',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    // Mengupdate data pasien
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap'    => 'required|string|max:100',
            'alamat'          => 'required|string',
            'usia'            => 'required|integer|min:0',
            'no_telp'         => 'nullable|string|max:20',
            'jenis_penyakit'  => 'nullable|string',
            'id_kamar'        => 'nullable|exists:kamars,id_kamar',
            'id_medis'        => 'nullable|exists:tenaga_medis,id_medis',
            'tanggal_masuk'   => 'required|date',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
