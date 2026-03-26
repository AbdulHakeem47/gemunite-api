<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;


Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login');
    Route::get('/auth/user', 'user');
    Route::post('/auth/logout', 'logout');
});


Route::prefix('admin')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/users', function () { });
    });
});