<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\Auth\LoginController;

// Login route (no auth required)
Route::post('login', [LoginController::class, 'login']);
