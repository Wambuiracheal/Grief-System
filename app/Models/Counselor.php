<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'location',
        'phone',
        'specialization', // Add other relevant counselor fields
        // Consider adding fields for qualifications, experience, etc.
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
