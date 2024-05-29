<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelerDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id_card',
        'passport',
    ];

  
public function traveler()
{
    return $this->belongsTo(User::class,"user_id");
}
}
