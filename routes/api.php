<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SetDataController;
use App\Http\Controllers\API\ApiLoginController;
use Laravel\Passport\Passport;

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
//routes for Login Auth Token
Route::post('register',[ApiLoginController::class,'registerUserExample']);
Route::post('login',[ApiLoginController::class,'loginUserExample']);

Route::middleware('auth:api')->group(function(){
Route::get('user', [ApiLoginController::class,'authenticatedUserDetails']);

Route::post('/create', [SetDataController::class, 'create']);
Route::post('/delete', [SetDataController::class, 'destroy']);
Route::get('/show', [SetDataController::class, 'show']);
Route::post('/update2', [SetDataController::class, 'update2']);
Route::get('/index', [SetDataController::class, 'index']);
Route::post('/logout',[ApiLoginController::class,'logout']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
    
// });


