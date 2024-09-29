<?php

namespace App\Charts;

use App\Models\Kegiatan;
use App\Models\Kunjungan;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KegiatanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {   
        $kegiatanType = Kegiatan::all();
        $kunjunganData = Kunjungan::all();

        $bimbingan = 0;
        $konsultasi = 0;
        $kunjungan = 0;

        foreach ($kegiatanType as $kegiatan) {
            if($kegiatan->jenis_kegiatans_id == 1) {
                $bimbingan++;
            } elseif ($kegiatan->jenis_kegiatans_id == 2) {
                $konsultasi++;
            }
        }

        $kunjungan = $kunjunganData->count();

        $data = [$bimbingan, $konsultasi, $kunjungan];
        $label = ['Bimbingan', 'Konsultasi', 'Kunjungan'];

        return $this->chart->pieChart()
            ->addData($data)
            ->setLabels($label);
    }
}
