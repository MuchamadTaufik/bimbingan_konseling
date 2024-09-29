<?php

namespace App\Http\Controllers;

use App\Charts\KegiatanChart;
use App\Charts\WargaSekolahChart;
use App\Models\Kegiatan;
use App\Models\Kunjungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KegiatanChart $kegiatanChart, WargaSekolahChart $wargaSekolahChart)
    {
        $user = Auth::user();
        
        // Menghitung total kegiatan bimbingan
        $totalBimbingan = Kegiatan::where('jenis_kegiatans_id', 1)->count();

        // Menghitung total kegiatan konsultasi
        $totalKonsultasi = Kegiatan::where('jenis_kegiatans_id', 2)->count();

        $totalKunjungan = Kunjungan::count();

        return view('index', [
            'kegiatanChart' => $kegiatanChart->build(),
            'wargaSekolahChart' => $wargaSekolahChart->build(),
            'totalBimbingan' => $totalBimbingan,
            'totalKonsultasi' => $totalKonsultasi,
            'totalKunjungan' => $totalKunjungan,
            'user' => $user
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
}
