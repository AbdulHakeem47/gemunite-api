<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;


Route::prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/auth/login', 'login');
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::get('/auth/user', 'user');
            Route::post('/auth/logout', 'logout');
            });
});
});