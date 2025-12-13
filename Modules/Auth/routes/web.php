<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Models\User;
use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\Auth\VerificationController;

Route::get('test', function () {
    return view('auth::emails.verification-code')->with(['code'=> 123456,'email'=>'gege@dsds.dsfge']);
});
