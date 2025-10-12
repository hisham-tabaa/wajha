<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Models\User;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\Auth\VerificationController;


Route::get('login/google', function () {
    return view('auth::auth.google-login'); // لاحظ :: لاستخدام namespace الموديول
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
