<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripService extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'service_id',
      ];

  
public function trip()
{
    return $this->belongsTo(Trip::class,"trip_id");
}
public function service()
{
    return $this->belongsTo(Service::class,"service_id");
}
}
