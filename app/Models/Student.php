<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students'; // your WAMP table name
    protected $primaryKey = 'id';  // or student_id if that's your PK
    protected $fillable = [
        'student_id',
        'name',
        'course',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'recipient_student_id');
    }

}