<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('facilities')->insert([
            [
                'faculty_name' => 'Conference Room',
                'type' => 'Room',
                'location' => 'Building A',
                'time_open' => '8:00 AM - 5:00 PM',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'Gym',
                'type' => 'Sports',
                'location' => 'Building B',
                'time_open' => '6:00 AM - 9:00 PM',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
