<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\LoginController;
use Modules\Auth\Http\Controllers\Auth\ProfileController;

// Login route (no auth required)
    Route::post('login', [LoginController::class, 'login']);
//have to be protected
Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/profile/update', [ProfileController::class, 'update']);
});
