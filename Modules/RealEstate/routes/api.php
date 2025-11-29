<?php

use Illuminate\Support\Facades\Route;
use Modules\RealEstate\Http\Controllers\RealEstateRentController;
use Modules\RealEstate\Http\Controllers\RealEstateSaleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('realestates-rent', RealEstateRentController::class)->names('realestate-rent');
    Route::apiResource('realestates-sale', RealEstateSaleController::class)->names('realestate-sale');
});
