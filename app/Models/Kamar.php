<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $primaryKey = 'id_kamar';

    protected $fillable = [
        'nama_kamar',
        'kelas',
        'kapasitas',
        'tersedia',
    ];
}
