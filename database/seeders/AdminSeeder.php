<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@snsu.edu',
                'password' => Hash::make('password'),
                'status' => 1,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
