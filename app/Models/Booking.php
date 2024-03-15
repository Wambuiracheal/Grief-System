<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'counselor_id',
        'date',
        'time',
        'status', // booked, completed, etc.
    ];

    // Define relationships (e.g., belongsTo for client and counselor)
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function counselor()
    {
        return $this->belongsTo(Counselor::class);
    }
}
