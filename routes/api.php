<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\AirCraft;
use App\Http\Controllers\AircraftController;
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

Route::get('aircraft'              ,  [AircraftController::class,'index']);
Route::get('aircraft/sort'         ,  [AircraftController::class,'customSort']);
Route::post('aircraft'              , [AircraftController::class,'store']);
Route::delete('aircraft/{aircraft}' , [AircraftController::class,'delete']);