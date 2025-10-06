<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Models\User;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\GoogleAuthController;
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('auths', GoogleAuthController::class)->names('auth');
});



Route::get('awad',function(Request $request){


    return User::filter($request)->first();
});


/**
 * {
 * 'name'=>'mhmd',
 * 'email'=>'mhmd@gmm.folk',
 * 'gender'=>'notNull',
 * 'age'=>'',
 *
 * }
 */
