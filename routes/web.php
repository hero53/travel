<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('reservation',[BilletController::class,'index'])->name('reservations.index');
Route::post('reservation',[BilletController::class,'store'])->name('reservation.store');


Route::get('/home', function () {
    return 'la home ici';
});
 
Route::post('register',[RegisterController::class,'register'])->name('register.store');
Route::get('connexion',[LoginController::class,'connexion'])->name('login.connexion');
Route::get('logouts',[LoginController::class,'logout'])->name('logout.customer');
Route::post('login',[LoginController ::class,'login'])->name('login.customer');


