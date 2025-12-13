<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwadTestController;

// Route::middleware(['throttle.custom', 'auth:sanctum'])->group(function () {


Route::get('/awad-test', [AwadTestController::class, 'index']);
Route::get('/test-001', function (Request $request) {
    return __('auth::messages.email_incorrect');

});
// });
