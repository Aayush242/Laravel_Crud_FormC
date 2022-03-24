<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SetDataController;

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


Route::post('/create', [SetDataController::class, 'create']);
Route::post('/delete', [SetDataController::class, 'destroy']);
Route::get('/show', [SetDataController::class, 'show']);
Route::post('/update2', [SetDataController::class, 'update2']);
Route::get('/index', [SetDataController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


