<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function Place(){
        return $this->hasOne('App\Model\Place','id','place_id');
    }

    public function Organizer(){
        return $this->hasOne('App\Model\Organizer','id','organizer');
    }

    public function Category(){
        return $this->hasOne('App\Model\Category','id','category');
    }

    public function SubCategory(){
        return $this->hasOne('App\Model\Category','id','sub_category');
    }

    public function Prices(){
        return $this->hasMany('App\Model\EventPrice','event_id','id');
    }


}
