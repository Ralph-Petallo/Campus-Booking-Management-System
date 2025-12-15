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
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('student_id')->unique(); // school ID
            $table->string('name');
            $table->string('course');
            $table->string('email')->unique();
            $table->string('year_level');
            $table->string('department');
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('facility_id')
                ->constrained('facilities')
                ->onDelete('cascade');
            $table->foreignId('student_id')
                ->constrained('students')
                ->onDelete('cascade');

            $table->date('date');
            $table->time('time_in');
            $table->time('time_out');
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('bookings');
        Schema::dropIfExists('students');

    }
};
