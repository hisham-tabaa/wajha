<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\Auth\GoogleAuthController;
use Modules\Auth\Http\Controllers\Auth\RegisterController;
use Modules\Auth\Http\Controllers\Auth\VerifyEmailController;
use Modules\Auth\Http\Controllers\Auth\UserController;


Route::middleware(['throttle.custom'])->group(function () {
    Route::post('google/token', [GoogleAuthController::class, 'loginWithGoogleToken']);
    Route::post('/register-users', [RegisterController::class, 'register']);
    Route::post('/verify-email', [VerifyEmailController::class, 'verify']);
    Route::post('/send-verification-code', [VerifyEmailController::class, 'sendVerificationCode']);
    Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/roles', [UserController::class, 'getRoles']);
    Route::patch('/users/change-role', [UserController::class, 'changeRole']);

    });

});
