<?php

namespace App\Charts;

use App\Models\Kelas;
use App\Models\Semester;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AtributChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {   
        $kelasData = Kelas::all();
        $semesterData = Semester::all();

        $kelas = 0;
        $semester = 0;

        $kelas = $kelasData->count();
        $semester = $semesterData->count();

        $data = [$kelas, $semester];
        $label = ['Total Kelas', 'Total Semester'];

        return $this->chart->pieChart()
            ->addData($data)
            ->setLabels($label);
    }
}
