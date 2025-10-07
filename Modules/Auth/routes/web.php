<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;


Route::get('login/google', function () {
    return view('auth::auth.google-login'); // لاحظ :: لاستخدام namespace الموديول
});
