<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\GoogleAuth\GoogleAuthController;
use Modules\Auth\Http\Controllers\Auth\RegisterController;
use Modules\Auth\Http\Controllers\Auth\VerifyEmailController;

Route::post('google/token', [GoogleAuthController::class, 'loginWithGoogleToken']);
Route::post('/register-users',[RegisterController::class, 'register']);
Route::post('/verify-email', [VerifyEmailController::class, 'verify']);
Route::post('/send-verification-code', [VerifyEmailController::class, 'sendVerificationCode']);