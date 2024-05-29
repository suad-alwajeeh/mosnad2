<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function allUser()
    {
       return User::where("user_type","traveler")->get();
    }
    public function createUser($data)
    {
        $user= User::create($data);
       $user->assignRole("traveler");
         return $user;
    }
    public function getUser($id)
    {
       return User::find($id);
    }
    public function updateUser($id,$data)
    {
      $item=$this->getUser($id);
      $item->update($data);
      return $item;
    }
}
