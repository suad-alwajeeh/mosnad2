<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
//	'middleware' => ['auth']
], function () {
    route::get('/login', [UserController::class,'login'])->name('login');
    route::post('/login', [UserController::class,'login_request'])->name('login_request');

    Route::group([
//'middleware' => ['auth']
    ], function () {
   route::post('/logout', [UserController::class,'logout'])->name('logout');
   route::get('/', [DashboardController::class,'index'])->name('dashboard');
   route::resource('users', UserController::class);
   route::resource('buses', BusController::class);
   route::resource('trips', TripController::class);
   route::resource('services', ServiceController::class);
   route::resource('cities', CityController::class);
   route::resource('reservation', ReservationController::class);

});
});