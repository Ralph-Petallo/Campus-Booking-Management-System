<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'student_id' => '2023-001',
                'name' => 'Benny Basil',
                'course' => 'BS Information Technology',
                'email' => 'benny@snsu.edu',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => '2023-002',
                'name' => 'Rose Delgado',
                'course' => 'BS Computer Science',
                'email' => 'rose@snsu.edu',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
