<?php

namespace App\Http\Controllers;

use App\Models\JadwalMedis;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;

class JadwalMedisController extends Controller
{
    public function index()
    {
        $jadwal = JadwalMedis::with('tenagaMedis')->get();
        $tenagaMedis = TenagaMedis::all();
        return view('medis.jadwal', compact('jadwal', 'tenagaMedis'));
    }

    public function store(Request $request)
    {

        $request->merge([
            'jam_mulai' => date('H:i', strtotime($request->jam_mulai)),
            'jam_selesai' => date('H:i', strtotime($request->jam_selesai)),
        ]);

        $request->validate([
            'id_medis'    => 'required|exists:tenaga_medis,id_medis',
            'hari'        => 'required|string|max:50',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalMedis::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'jam_mulai' => date('H:i', strtotime($request->jam_mulai)),
            'jam_selesai' => date('H:i', strtotime($request->jam_selesai)),
        ]);

        $request->validate([
            'id_medis'    => 'required|exists:tenaga_medis,id_medis',
            'hari'        => 'required|string|max:50',
            'jam_mulai'   => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal = JadwalMedis::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalMedis::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
