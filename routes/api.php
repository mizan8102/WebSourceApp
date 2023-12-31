<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CityController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

// only for authenticate user 
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/city', CityController::class);
    Route::post('/cityFileUpload', [CityController::class, 'cityFileUpload']);
});

Route::get('/public/City', [CityController::class, 'index']);