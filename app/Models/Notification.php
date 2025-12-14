<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Notification extends Model
{
    protected $fillable = [
        'student_id',
        'booking_id',
        'action',
        'is_read',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

