<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Http\Controllers\API\Role\RoleController;

Route::middleware(['auth:sanctum', 'throttle.custom'])->group(function () {
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        // Route::get('/my-role', [RoleController::class, 'showMyRole']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::patch('/{id}', [RoleController::class, 'update']);
        Route::delete('/{id}', [RoleController::class, 'destroy']);
    });
});
