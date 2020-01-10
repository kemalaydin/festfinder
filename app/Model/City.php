<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function getCountry(){
        return $this->hasOne('Model\Country','country_id','id');
    }
}
