<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
     public function toArray(Request $request): array
     {
         return [
             'id' => $this->id,
             'name' => $this->name,
             'date_of_birth' => $this->traveler->date_of_birth,
             'passport' => $this->traveler->passport,
             'id_card' => $this->traveler->id_card,
             'email' => $this->email,
             'avater' => $this->created_at,
             "phone"=>$this->phone,
             "user_type"=>$this->user_type,
             'role' => $this->roles[0]->display_name,
             'updated_at' => $this->updated_at,
         ];
     }
}
