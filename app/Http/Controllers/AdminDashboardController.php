<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Kamar;
use App\Models\TenagaMedis;
use App\Models\JadwalMedis;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPasien = Pasien::count();
        $kamarTersedia = Kamar::sum('tersedia');
        $janjiHariIni = JadwalMedis::where('hari', Carbon::now()->format('l'))->count();
        $dokterAktif = TenagaMedis::where('jenis_medis', 'Dokter')->count();

        $recentPasiens = Pasien::latest()->take(5)->get();

        return view('admin.index', compact(
            'totalPasien',
            'kamarTersedia',
            'janjiHariIni',
            'dokterAktif',
            'recentPasiens'
        ));
    }
}
