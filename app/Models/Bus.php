<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',"bus_status",
        'bus_number',"bus_license","driver_id",
      ];

  
public function trip()
{
    return $this->belongsTo(Trip::class,"trip_id");
}
}
