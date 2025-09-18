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

// SITE PÚBLICO
Route::get('/', [\App\Http\Controllers\Site\HomeController::class, 'index'])->name('site.home');
Route::get('/eventos', [\App\Http\Controllers\Site\EventController::class, 'index'])->name('site.events');
Route::get('/eventos/{event}', [\App\Http\Controllers\Site\EventController::class, 'show'])->name('site.events.show');

// ADMIN
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:web')->group(function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('companies', \App\Http\Controllers\CompanyController::class);
        Route::resource('users', \App\Http\Controllers\AdminUserController::class);
        Route::resource('audit-logs', \App\Http\Controllers\AuditLogController::class)->only(['index','show']);
        Route::resource('reports', \App\Http\Controllers\ReportController::class)->only(['index']);
        Route::get('reports/generate', [\App\Http\Controllers\ReportController::class, 'generate'])->name('reports.generate');
    });
});

// COMPANY
Route::prefix('company')->name('company.')->group(function() {
    Route::get('login', [\App\Http\Controllers\Company\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Company\Auth\LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [\App\Http\Controllers\Company\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:company')->group(function() {
        Route::get('dashboard', [\App\Http\Controllers\Company\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', \App\Http\Controllers\EventController::class);
        Route::resource('tickets', \App\Http\Controllers\TicketController::class);
        Route::resource('batches', \App\Http\Controllers\BatchController::class);
        Route::resource('company-users', \App\Http\Controllers\CompanyUserController::class);
    });
});

// CLIENT
Route::prefix('client')->name('client.')->group(function() {
    Route::get('login', [\App\Http\Controllers\Client\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Client\Auth\LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [\App\Http\Controllers\Client\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:client')->group(function() {
        Route::get('dashboard', [\App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');
        Route::get('orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders');
        Route::get('tickets', [\App\Http\Controllers\Client\TicketController::class, 'index'])->name('tickets');
    });
});



