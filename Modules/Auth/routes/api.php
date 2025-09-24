<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\GoogleAuthController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('auths', AuthController::class)->names('auth');
});

// Role-aware Google auth route (matches your pattern)
Route::post('{role}/auth/google', [GoogleAuthController::class, 'login']);

// Keep the original route for backwards compatibility (role defaults to "default")
Route::post('auth/google', [GoogleAuthController::class, 'login']);
