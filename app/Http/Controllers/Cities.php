<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class Cities extends Controller
{
    function getCities($var = null)
    {
        if ($var!=null) {
            return City::where('city_id','=',$var)
            ->orWhere('city_name','=',$var)
            ->orWhere('province','=',$var)
            ->get();
        }else{
            return City::all();
        }
    }
}
