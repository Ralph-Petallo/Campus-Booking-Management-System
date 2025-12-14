<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public $table = 'bookings';

    protected $fillable = [
        'student_id',
        'student_name',
        'facility',
        'date',
        'time_in',
        'time_out',
        'status'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

}
