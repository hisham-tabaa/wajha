<?php

use Illuminate\Support\Facades\Route;
use Modules\Society\Http\Controllers\SocietyController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('societies', SocietyController::class)->names('society');
});
