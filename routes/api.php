<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUsers;
use App\Http\Controllers\Cities;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*We need a get route here because we are only getting data*/
Route::get('users',[UserController::class,'getData']);

Route::get('admin',[AdminUsers::class,'getAdminUsers']);
Route::get('city/{var?}',[Cities::class,'getCities']);
