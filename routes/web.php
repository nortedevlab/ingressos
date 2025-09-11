<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CompanyController,
    CompanyUserController,
    EventController,
    TicketController,
    BatchController,
    OrderController,
    PaymentController,
    DiscountCouponController,
    PaymentGatewayController,
    ServiceFeeController,
    BoothController,
    AttendantController,
    PdaController,
    AccessLogController,
    ClientController
};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resources([
        'companies'        => CompanyController::class,
        'company-users'    => CompanyUserController::class,
        'clients'          => ClientController::class,
        'events'           => EventController::class,
        'tickets'          => TicketController::class,
        'batches'          => BatchController::class,
        'orders'           => OrderController::class,
        'payments'         => PaymentController::class,
        'discount-coupons' => DiscountCouponController::class,
        'payment-gateways' => PaymentGatewayController::class,
        'service-fees'     => ServiceFeeController::class,
        'booths'           => BoothController::class,
        'attendants'       => AttendantController::class,
        'pdas'             => PdaController::class,
        'access-logs'      => AccessLogController::class,
    ]);
});


