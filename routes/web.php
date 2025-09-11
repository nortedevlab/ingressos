<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('events', EventController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('booths', BoothController::class);
    Route::resource('pdas', PdaController::class);
});

