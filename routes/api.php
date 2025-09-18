<?php

use App\Http\Controllers\Auth\Api\LoginController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('me', [LoginController::class, 'me'])->name('me');
    });
});
