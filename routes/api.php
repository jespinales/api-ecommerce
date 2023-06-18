<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserInfoRetrieveController;
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
Route::prefix('auth')->group(function () {
    Route::post('login', LoginController::class)->name('api.auth.login');
    Route::post('register', RegisterController::class)->name('api.auth.register');
});

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('client')->group(function () {
        Route::get('/{client}', UserInfoRetrieveController::class)->name('api.client.me');
    });
});