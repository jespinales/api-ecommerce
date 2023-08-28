<?php

use App\Http\Controllers\Categories\DestroyCategoryController;
use App\Http\Controllers\Categories\UpdateCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserInfoRetrieveController;
use App\Http\Controllers\Categories\IndexCategoryController;
use App\Http\Controllers\Categories\ShowCategoryController;
use App\Http\Controllers\Categories\StoreCategoryController;

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
    Route::prefix('auth')->group(function () {
        Route::post('logout', LogoutController::class)->name('api.auth.logout');
    });
    Route::prefix('client')->group(function () {
        Route::get('/me', UserInfoRetrieveController::class)->name('api.client.me');
    });
    Route::prefix('categories')->group(function () {
        Route::post('/', StoreCategoryController::class)->name('api.categories.store');
        Route::patch('/{category}', UpdateCategoryController::class)
            ->name('api.categories.update');
        Route::delete('/{category}', DestroyCategoryController::class)
            ->name('api.categories.destroy');
    });
});

Route::prefix('categories')->group(function() {
    Route::get('/', IndexCategoryController::class)->name('api.categories.index');
    Route::get('/{category}', ShowCategoryController::class)->name('api.categories.show');
});
