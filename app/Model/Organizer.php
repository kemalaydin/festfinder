<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{

    protected $fillable = ['name','user_id','description'];

    public function Events(){
        return $this->hasMany('App\Model\Event','organizer','id');
    }

    public function User(){
        return $this->hasOne('App\Model\User','id','user_id');
    }
}
