<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
/** use Laravel\Fortify\TwoFactorAuthenticatable; */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // ✅ Allow mass assignment of role
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'two_factor_confirmed_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * A user has many trips.
     */
    public function trips()
    {
        return $this->hasMany(\App\Models\Trip::class);
    }

    /**
     * A user has many saved destinations.
     */
    public function savedDestinations()
    {
        return $this->hasMany(\App\Models\SavedDestination::class);
    }
}
