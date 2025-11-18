<?php

use Illuminate\Support\Facades\Route;
use Modules\RealEstate\Http\Controllers\RealEstateController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    // Routes للبائع (عقاراته الخاصة)
    Route::prefix('seller')->group(function () {
        Route::get('/my-realestates', [RealEstateController::class, 'myRealEstates'])->name('realestate.my');
    });

    // Routes عامة للجميع
    Route::apiResource('realestates', RealEstateController::class)->names('realestate');
});
