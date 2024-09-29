<?php

namespace App\Charts;

use App\Models\Siswa;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class WargaSekolahChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $wargaSekolah = User::all();
        $siswaData = Siswa::all();
        
        $guruBk = 0;
        $admin = 0;
        $siswa = 0;

        foreach ($wargaSekolah as $warga) {
            if($warga->role == 'guru') {
                $guruBk++;
            } elseif ($warga->role == 'admin') {
                $admin++;
            }
        }
        
        $siswa = $siswaData->count();
        $guruBk = $wargaSekolah->count();

        $data = [$admin, $guruBk, $siswa];
        $label = ['Admin Web', 'Guru BK', 'Siswa'];

        return $this->chart->pieChart()
            ->addData($data)
            ->setLabels($label);
    }
}
