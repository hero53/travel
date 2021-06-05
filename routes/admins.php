<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ReservationController;


Route::prefix('destination')->group(function () {
   Route::get('/',[DestinationController::class,'index'])->name('destination.index');
   Route::post('/store',[DestinationController::class,'store'])->name('destination.store');
   Route::get('/destroy/{id}',[DestinationController::class,'destroy'])->name('destination.destroy');
});

Route::prefix('reservation')->group(function () {
   Route::get('/',[ReservationController::class,'index'])->name('reservation.index');
   Route::get('/print',[ReservationController::class,'print'])->name('reservation.print');
   Route::get('/destroy/{id}',[DestinationController::class,'destroy'])->name('reservation.destroy');
});