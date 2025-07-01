<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'usia',
        'no_telp',
        'jenis_penyakit',
        'id_kamar',
        'id_medis',
        'tanggal_masuk',
    ];

    // Relasi ke Kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id_kamar');
    }

    // Relasi ke Tenaga Medis
    public function tenagaMedis()
    {
        return $this->belongsTo(TenagaMedis::class, 'id_medis', 'id_medis');
    }
}
