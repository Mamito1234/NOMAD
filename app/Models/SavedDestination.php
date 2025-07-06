<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedDestination extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'country',
        'city',
    ];

    /**
     * Get the user that owns the destination.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
