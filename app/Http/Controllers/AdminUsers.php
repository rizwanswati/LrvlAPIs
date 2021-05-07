<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_user;

class AdminUsers extends Controller
{
    function getAdminUsers(){
        return Admin_user::all();
    }
}
