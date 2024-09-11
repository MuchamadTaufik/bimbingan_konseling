<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'semester_id' => 1,
                'name' => 'Fikri Nur Hakim',
                'email' => 'gurubk1@gmail.com',
                'password' => '123456',
            ],
            [   
                'semester_id' => 1,
                'name' => 'Guru BK',
                'email' => 'guru@gmail.com',
                'password' => '123456',
            ],
        ];
        
        foreach ($data as $value) {
            User::insert([
                'semester_id' => $value['semester_id'] ?? null,
                'name' => $value['name'] ?? null,
                'email' => $value['email'] ?? null,
                'password' => Hash::make($value['password'] ?? null), // Enkripsi password
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        
    }
}
