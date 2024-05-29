<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/userll', function (Request $request) {
    return $request->user();
});
 
Route::group([
    'prefix' => 'v1',
    //	'middleware' => ['auth']
], function () {
     Route::controller(UserController::class)->group(function () {
        Route::post('users', [UserController::class,"store"]);
        Route::get('users', [UserController::class,"index"]);
        Route::put('users/{id}', [UserController::class,"update"]);
        Route::put('users/{id}', [UserController::class,"show"]);
        Route::delete('users/{id}', [UserController::class,"destroy"]);
    }); 
});
