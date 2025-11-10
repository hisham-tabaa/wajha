<?php

use Illuminate\Support\Facades\Route;
use Modules\Society\Http\Controllers\SocietyController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('societies', SocietyController::class)->names('society');
});
