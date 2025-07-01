<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('medis.kamar', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:50',
            'kelas' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1',
            'tersedia' => 'required|integer|min:0',
        ]);

        Kamar::create($request->all());
        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kamar' => 'required|string|max:50',
            'kelas' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1',
            'tersedia' => 'required|integer|min:0',
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->update($request->all());

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();

        return redirect()->route('kamar.index')->with('success', 'Data kamar berhasil dihapus.');
    }
}
