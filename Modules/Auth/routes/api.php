<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\AuthController;
use Modules\Auth\Http\Controllers\Auth\LoginController;

use Modules\Auth\Http\Controllers\Auth\RegisterController;
use Modules\Auth\Http\Controllers\Auth\GoogleAuthController;

Route::middleware(['throttle.custom'])->group(function () {
// This middelware to make user have the same request 3 Attempts in 5s  (the number come from convig->throttle.php)
    Route::post('login', [LoginController::class, 'login']);
    Route::post('auth/google', [GoogleAuthController::class, 'login']);
    Route::post('/register-users', [RegisterController::class, 'register']);
});
