<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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
});

Route::middleware('auth:sanctum')->group(function() {

    Route::prefix('auth')->group(function () {
        Route::post('logout', LogoutController::class)->name('api.auth.logout');
    });

});
