<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenagaMedis extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'tenaga_medis';
    protected $primaryKey = 'id_medis';

    protected $fillable = [
        'nama_medis',
        'jenis_kelamin',
        'jenis_medis',
        'spesialisasi',
        'poto',
        'no_telp',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke jadwal medis
    public function jadwalMedis()
    {
        return $this->hasMany(JadwalMedis::class, 'id_medis', 'id_medis');
    }
}
