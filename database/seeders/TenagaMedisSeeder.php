<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TenagaMedisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tenaga_medis')->insert([
            [
                'nama_medis' => 'dr. Siti Lestari',
                'jenis_kelamin' => 'P',
                'jenis_medis' => 'Dokter',
                'spesialisasi' => 'Umum',
                'no_telp' => '081234567890',
                'username' => 'dokter1',
                'email' => 'dokter1@example.com',
                'password' => Hash::make('dokter123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_medis' => 'Bid. Lina Fitri',
                'jenis_kelamin' => 'P',
                'jenis_medis' => 'Bidan',
                'spesialisasi' => 'Kebidanan',
                'no_telp' => '081298765432',
                'username' => 'bidan1',
                'email' => 'bidan1@example.com',
                'password' => Hash::make('bidan123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
