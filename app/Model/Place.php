<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function Country(){
        return $this->hasOne('App\Model\Country','id','country');
    }

    public function City(){
        return $this->hasOne('App\Model\City','id','city');
    }

    public function Events(){
        return $this->hasMany('App\Model\Event','place_id','id');
    }
}
