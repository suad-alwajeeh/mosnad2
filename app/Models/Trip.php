<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'day',
        'time',
        'period',
        'start_at',
        'status',
        'trip_official',"bus_id","trip_type_id","from_city_id","to_city_id","note"
    ];

  
public function official()
{
    return $this->belongsTo(User::class,"trip_official");
}
public function trip_type()
{
    return $this->belongsTo(TripType::class,"trip_type_id");
}
public function bus()
{
    return $this->belongsTo(Bus::class,"bus_id");
}
public function from_city()
{
    return $this->belongsTo(City::class,"from_city_id");
}
public function to_city()
{
    return $this->belongsTo(City::class,"to_city_id");
}
public function services()
{
    return $this->hasMany(TripService::class);
}
}
