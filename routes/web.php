<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => "Admin dashboard")->name('admin.dashboard');
});

Route::prefix('manager')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => "Manager dashboard")->name('manager.dashboard');
});

Route::prefix('account')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => "Account dashboard")->name('account.dashboard');
});
