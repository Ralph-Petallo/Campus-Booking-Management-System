<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    public $table = 'facilities';

    protected $fillable = [
        'administrator_name',
        'facility_name',
        'type',
        'location',
        'time_open',
        'image'
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
