<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function getData(){
        /*getting Data in JSON format. for that just array is required*/
        return [
            'name'=>'usama',
            'program' => 'BCV',
            'Role'  => 'BCV-014',
            'Uni'   => 'Comsian'
        ];
    }
}
