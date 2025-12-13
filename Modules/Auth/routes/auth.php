<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\GoogleAuthController;
use Modules\Auth\Http\Controllers\Auth\PasswordResetController;
use Modules\Auth\Http\Controllers\Auth\RegisterController;
use Modules\Auth\Http\Controllers\Auth\UserController;
use Modules\Auth\Http\Controllers\Auth\VerifyEmailController;

Route::middleware(['throttle.custom'])->group(function () {
    Route::post('/register-users', [RegisterController::class, 'register']);
    Route::post('/verify-email', [VerifyEmailController::class, 'verify']);
    Route::post('/send-verification-code', [VerifyEmailController::class, 'sendVerificationCode']);
    Route::post('/password-reset/request', [PasswordResetController::class, 'requestReset']);
    Route::post('/password-reset/verify-code', [PasswordResetController::class, 'verifyCode']);
    Route::post('/password-reset/reset', [PasswordResetController::class, 'reset']);
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/roles', [UserController::class, 'getRoles']);
        Route::patch('/users/change-role', [UserController::class, 'changeRole']);


    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/roles', [UserController::class, 'getRoles']);
        Route::patch('/users/change-role', [UserController::class, 'changeRole']);
    });
});    Route::post('/google-auth', [GoogleAuthController::class, 'authenticate']);
});
