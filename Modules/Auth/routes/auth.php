<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\GoogleAuth\GoogleAuthController;


Route::post('google/token', [GoogleAuthController::class, 'loginWithGoogleToken']);

