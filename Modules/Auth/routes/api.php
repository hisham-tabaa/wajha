<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\LoginController;

use Modules\Auth\Http\Controllers\UserRegisterController;
use Modules\Auth\Http\Controllers\GoogleAuth\GoogleAuthController;

// Login route (no auth required)
Route::post('login', [LoginController::class, 'login']);

// Keep the original route for backwards compatibility (role defaults to "default")
Route::post('auth/google', [GoogleAuthController::class, 'login']);
//
Route::post('/register-users', [UserRegisterController::class, 'register']);


