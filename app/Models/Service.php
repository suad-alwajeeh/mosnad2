<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'name',
        'icon',
        'trip_type_id',
        
    ];

  
public function trip()
{
    return $this->belongsTo(TripType::class,"trip_type_id");
}
}
