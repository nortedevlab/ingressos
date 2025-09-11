<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
    EventApiController,
    OrderApiController,
    PaymentApiController,
    PdaApiController
};

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/events', [EventApiController::class, 'index']);
    Route::post('/orders', [OrderApiController::class, 'store']);
    Route::post('/payments', [PaymentApiController::class, 'store']);
    Route::post('/pda/access', [PdaApiController::class, 'scanTicket']);
});

