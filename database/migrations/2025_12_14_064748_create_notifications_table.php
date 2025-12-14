<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            // Who performed the action (optional if you want flexibility)
            $table->foreignId('student_id')
                ->nullable() // keep nullable to avoid errors if unknown
                ->constrained('students')
                ->onDelete('cascade');

            // Related booking (optional)
            $table->foreignId('booking_id')
                ->nullable()
                ->constrained('bookings')
                ->onDelete('cascade');

            // Action text: reserved, cancelled, confirmed
            $table->string('action');

            // Recipient (who will see the notification)
            $table->foreignId('recipient_id')
                ->nullable()
                ->constrained('students')
                ->onDelete('cascade');

            // Whether the notification is read
            $table->boolean('is_read')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
