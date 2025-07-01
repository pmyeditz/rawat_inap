<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMedis extends Model
{
    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_medis',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function tenagaMedis()
    {
        return $this->belongsTo(TenagaMedis::class, 'id_medis', 'id_medis');
    }
}
