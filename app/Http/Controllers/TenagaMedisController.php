<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenagaMedis;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class TenagaMedisController extends Controller
{
    public function index()
    {
        $data = TenagaMedis::all();
        return view('medis.medis', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_medis'    => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'jenis_medis'   => 'required|in:Dokter,Bidan',
            'spesialisasi'  => 'nullable|string',
            'poto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_telp'       => 'nullable|max:20|unique:tenaga_medis,no_telp',
            'username'      => 'required|unique:tenaga_medis|max:50',
            'email'         => 'required|email:dns|max:100|unique:tenaga_medis,email',
            'password'      => 'required|min:6',
        ]);

        // Cek jika email sudah digunakan admin
        if (Admin::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email ini sudah digunakan oleh akun admin.'])->withInput();
        }

        $medis = new TenagaMedis();
        $medis->nama_medis    = $request->nama_medis;
        $medis->jenis_kelamin = $request->jenis_kelamin;
        $medis->jenis_medis   = $request->jenis_medis;
        $medis->spesialisasi  = $request->spesialisasi;
        $medis->no_telp       = $request->no_telp;
        $medis->username      = $request->username;
        $medis->email         = $request->email;
        $medis->password      = Hash::make($request->password);
        $medis->save();

        if ($request->hasFile('poto')) {
            $file = $request->file('poto');
            $ext = $file->getClientOriginalExtension();
            $filename = $medis->id_medis . '_' . $medis->username . '.' . $ext;
            $file->move(public_path('assets/upload'), $filename);
            $medis->poto = 'assets/upload/' . $filename;
            $medis->save();
        }

        return redirect()->route('medis.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $medis = TenagaMedis::findOrFail($id);

        // Aturan validasi dasar
        $rules = [
            'nama_medis'    => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'jenis_medis'   => 'required|in:Dokter,Bidan',
            'spesialisasi'  => 'nullable|string',
            'poto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'username'      => 'required|max:50|unique:tenaga_medis,username,' . $id . ',id_medis',
            'password'      => 'nullable|min:6',
        ];

        // Validasi no_telp jika diisi
        if ($request->filled('no_telp')) {
            $rules['no_telp'] = 'max:20|unique:tenaga_medis,no_telp,' . $id . ',id_medis';
        }

        // Validasi email hanya jika berbeda dari sebelumnya
        if ($request->email !== $medis->email) {
            $rules['email'] = 'required|email:dns|max:100|unique:tenaga_medis,email,' . $id . ',id_medis';

            // Cek jika email sudah digunakan admin
            if (Admin::where('email', $request->email)->exists()) {
                return back()->withErrors(['email' => 'Email ini sudah digunakan oleh akun admin.'])->withInput();
            }
        }

        $request->validate($rules);

        // Simpan data yang diubah
        $medis->nama_medis    = $request->nama_medis;
        $medis->jenis_kelamin = $request->jenis_kelamin;
        $medis->jenis_medis   = $request->jenis_medis;
        $medis->spesialisasi  = $request->spesialisasi;
        $medis->no_telp       = $request->no_telp;
        $medis->username      = $request->username;

        // Update email jika diubah
        if ($request->email !== $medis->email) {
            $medis->email = $request->email;
        }

        // Update password jika diisi
        if ($request->filled('password')) {
            $medis->password = Hash::make($request->password);
        }

        // Update foto jika diupload
        if ($request->hasFile('poto')) {
            if ($medis->poto && file_exists(public_path($medis->poto))) {
                unlink(public_path($medis->poto));
            }

            $file = $request->file('poto');
            $ext = $file->getClientOriginalExtension();
            $filename = $medis->id_medis . '_' . $medis->username . '.' . $ext;
            $file->move(public_path('assets/upload'), $filename);
            $medis->poto = 'assets/upload/' . $filename;
        }

        $medis->save();

        return redirect()->route('medis.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $data = TenagaMedis::findOrFail($id);

        if ($data->poto && file_exists(public_path($data->poto))) {
            unlink(public_path($data->poto));
        }

        $data->delete();

        return redirect()->route('medis.index')->with('success', 'Data berhasil dihapus.');
    }
}
