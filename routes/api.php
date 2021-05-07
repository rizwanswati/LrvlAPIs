<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUsers;
use App\Http\Controllers\Cities;
use App\Http\Controllers\ItemInfo;
use App\Http\Controllers\FileUpload;


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

/**Posting and Updating Data Through API**/
Route::post('addcity',[Cities::class,'saveCity']);
Route::put('updatecity',[Cities::class,'updateCity']);

/**API Resource Route Call**/
Route::apiResource('items',ItemInfo::class);

/**File upload Api Route**/
Route::post('file',[FileUpload::class,'upload']);
