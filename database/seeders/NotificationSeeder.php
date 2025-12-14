<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notifications')->insert([
            [
                'student_id' => 1,        // actor: Benny
                'recipient_id' => 1,      // who sees it (can be self or admin)
                'booking_id' => 1,
                'action' => 'reserved',
                'is_read' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,        // actor: Rose
                'recipient_id' => 1,      // who sees it
                'booking_id' => 2,
                'action' => 'cancelled',
                'is_read' => false,
                'created_at' => now()->subWeek(),
                'updated_at' => now()->subWeek(),
            ]
        ]);
    }
}
