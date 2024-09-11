<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Semester::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => 'Semester Ganjil 2024',
            ],
            [
                'name' => 'Semester Genap 2024',
            ],
            [
                'name' => 'Semester Ganjil 2025',
            ],
            [
                'name' => 'Semester Genap 2025',
            ],
            [
                'name' => 'Semester Ganjil 2026',
            ],
            [
                'name' => 'Semester Genap 2026',
            ],
            [
                'name' => 'Semester Ganjil 2027',
            ],
            [
                'name' => 'Semester Genap 2027',
            ],
        ];
        
        foreach ($data as $value) {
            Semester::insert([
                'name' => $value['name'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
