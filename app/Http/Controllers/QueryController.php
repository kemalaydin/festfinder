<?php

namespace App\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function country($id){
        $Cities = City::where('country_id',$id)->get();
        return $Cities;
    }
}
