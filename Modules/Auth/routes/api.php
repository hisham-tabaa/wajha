<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\GoogleAuthController;
use Modules\Auth\Http\Controllers\LoginController;

// Login route (no auth required)
Route::post('login', [LoginController::class, 'login']);

// Role-aware Google auth route (matches your pattern)
Route::post('{role}/auth/google', [GoogleAuthController::class, 'login']);

// Keep the original route for backwards compatibility (role defaults to "default")
Route::post('auth/google', [GoogleAuthController::class, 'login']);
