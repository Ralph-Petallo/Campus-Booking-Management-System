<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students'; // your WAMP table name
    protected $primaryKey = 'id';  // or student_id if that's your PK
    protected $fillable = [
        'student_id',
        'name',
        'course',
        'email',
        'password'
    ];
}