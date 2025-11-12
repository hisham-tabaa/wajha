<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwadTestController;

Route::middleware(['throttle.custom', 'auth:sanctum'])->group(function () {


Route::get('/awad-test', [AwadTestController::class, 'index']);

});
