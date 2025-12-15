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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => '2023-002',
                'name' => 'Rose Delgado',
                'course' => 'BS Computer Science',
                'email' => 'bryllrose@snsu.edu',
                'password' => Hash::make('bryllrose'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => '2023-003',
                'name' => 'Ria May',
                'course' => 'BS Computer Science',
                'email' => 'riamay@snsu.edu',
                'password' => Hash::make('riamay'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => '2023-004',
                'name' => 'Louie Khen',
                'course' => 'BS Information Technology',
                'email' => 'loiuekhen@snsu.edu',
                'password' => Hash::make('loiuekhen'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
