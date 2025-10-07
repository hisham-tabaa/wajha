<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\AuthController;
use Modules\Auth\Http\Controllers\Auth\LoginController;

use Modules\Auth\Http\Controllers\RegisterController;
use Modules\Auth\Http\Controllers\Auth\GoogleAuthController;

// Login route (no auth required)
Route::post('login', [LoginController::class, 'login']);

// Keep the original route for backwards compatibility (role defaults to "default")
Route::post('auth/google', [GoogleAuthController::class, 'login']);
//
<<<<<<< HEAD
Route::post('/register-users', [UserRegisterController::class, 'register']);
=======
    Route::post('/register-users', [RegisterController::class, 'register']);
>>>>>>> LoginWithGoogle


