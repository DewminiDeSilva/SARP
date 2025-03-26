<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship with StaffProfile.
     * Assumes 'email' in users matches 'email_address' in staff_profiles.
     */
    public function staffProfile()
    {
        return $this->hasOne(StaffProfile::class, 'email_address', 'email');
    }

    /**
     * Get the user's profile image.
     */
    public function getProfileImageAttribute()
    {
        return $this->staffProfile && $this->staffProfile->photo
            ? asset('storage/' . $this->staffProfile->photo)
            : asset('assets/images/default_profile.png');
    }
}
