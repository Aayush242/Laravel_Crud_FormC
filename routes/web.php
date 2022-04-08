<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LoginController::class)->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/account',AccountController::class)->middleware('auth');

Route::resource('/contact',ContactController::class)->middleware('auth');

Route::resource('/project',ProjectController::class)->middleware('auth');

Route::resource('profile',UserController::class)->middleware('auth');

//Route For Socialtite..
Route::get('login/{provider}',[SocialController::class, 'redirect'] );
Route::get('login/{provider}/callback', [SocialController::class, 'Callback']);

Route::get('Account/layout', [AccountController::class, 'layout']);

// Route::resource('contact', function (){
    
//     $accounts = Account::with('contacts')->first();

//     $accounts->contact()->attach();
// });
