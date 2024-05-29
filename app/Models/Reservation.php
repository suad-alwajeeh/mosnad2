<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'traveler_id',
        'trip_id',
        
    ];

    public function traveler()
{
    return $this->belongsTo(User::class,"traveler_id");
}
public function trip()
{
    return $this->belongsTo(Trip::class,"trip_id");
}
}
