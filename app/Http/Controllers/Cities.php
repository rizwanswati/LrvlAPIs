<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class Cities extends Controller
{
    function getCities($var = null)
    {
        if ($var!=null) {
            return City::where('city_id','=',$var)
            ->orWhere('city_name','=',$var)
            ->orWhere('city_name','like','%'.$var)
            ->orWhere('province','=',$var)
            ->get();
        }else{
            return City::all();
        }
    }

    function saveCity(Request $request)
    {
        /**Validator**/

        $rules = array(
            'cityname' => 'required',
            'province' => 'required',
            'mincharges' => 'required|max:10000|min:0',
            'status' => 'required'
        );

        $validate = Validator::make($request->all(),$rules);
        if ($validate->fails()) {
           return response()->json($validate->errors(),401);
        }else{
            $newcity = new City;
            $newcity->city_name = $request->cityname;
            $newcity->province = $request->province;
            $newcity->minimum_charges = $request->mincharges;
            $newcity->city_status = $request->status;
            if ($newcity->save()) {
                return ['key'=>'Data Saved'];
            }else{
                return ['key'=>'Data Not Saved'];
            }
        }


    }

    function updateCity(Request $request)
    {
        $city = City::find($request->city_id); //static method call
        $city->minimum_charges = $request->mincharges;
        $city->city_status = $request->status;
        if ($city->save()) {
            return ['key'=>'Data Updated'];
        }else{
            return ['key'=>'Data Not Not'];
        }

    }
}
