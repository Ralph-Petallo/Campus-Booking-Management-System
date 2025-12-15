<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    // Table name
    protected $table = 'admin';

    // Fillable fields
    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
        'role',
        'profile_picture',
    ];

    // Hidden fields (will not show in arrays or JSON)
    protected $hidden = [
        'password',
        'remember_token', // recommended if using remember me
    ];

    // Optional: Casts
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'recipient_admin_id');
    }

}
