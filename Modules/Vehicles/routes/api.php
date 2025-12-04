<?php

use Illuminate\Support\Facades\Route;
use Modules\Vehicles\Http\Controllers\VehicleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('vehicles', VehicleController::class)->names('vehicles');
});
