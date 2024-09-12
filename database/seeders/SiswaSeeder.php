<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            Schema::disableForeignKeyConstraints();
            Siswa::truncate();
            Schema::enableForeignKeyConstraints();
    
            $data = [
                [
                    'name' => 'Bryan Sihombing',
                    'nomor_induk' => '10203040',
                    'semester_id' => 1,
                    'kelas_id' => 2,
                ],
                [
                    'name' => 'Tiora Aryanti',
                    'nomor_induk' => '20203050',
                    'semester_id' => 2,
                    'kelas_id' => 3,
                ],
            ];
            
            foreach ($data as $value) {
                Siswa::insert([
                    'name' => $value['name'] ?? null,
                    'nomor_induk' => $value['nomor_induk'] ?? null,
                    'semester_id' => $value['semester_id'] ?? null,
                    'kelas_id' => $value['kelas_id'] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
