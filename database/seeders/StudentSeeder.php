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
                'name' => 'Ralph Petallo',
                'course' => 'BS Information Technology',
                'email' => 'ralphpetallo@snsu.edu',
                'password' => Hash::make('ralphpetallo'),
                'year_level' => '3rd Year',
                'department' => 'IT Department',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
