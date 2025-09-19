<?php

use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('me', [LoginController::class, 'me'])->name('me');

        Route::prefix('user')->group(function () {
            Route::post('profile', [UserController::class, 'updateProfile']);
            Route::post('password', [UserController::class, 'updatePassword']);
        });

    });
});
