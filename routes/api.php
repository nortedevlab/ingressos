<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/me', fn (Request $request) => [
    'user' => $request->user(),
]);
