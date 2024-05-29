<?php

namespace App\Services;

use App\Models\TravelerDetail;

class TravelerDataService
{
     
    public function saveData($data)
    {
        $data= TravelerDetail::create($data);
          return $data;
    }
    public function getData($id)
    {
       return TravelerDetail::find($id);
    }
    public function updateData($id,$data)
    {
      $item=$this->getData($id);
      $item->update($data);
      return $item;
    }
}
