<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Model\Currency;
use App\Model\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('frontend.index');
    }

    public function dummy(){
        dd(json_encode(["14.01.2020 15:00","14.01.2020 18:00"]));
    }
}
