<?php

use App\Http\Controllers\AwadTestController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle.custom', 'auth:sanctum'])->group(function () {

    Route::get('/awad-test', [AwadTestController::class, 'index']);

});
