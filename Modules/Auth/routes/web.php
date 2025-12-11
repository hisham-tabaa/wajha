<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return view('auth::emails.verification-code')->with(['code' => 123456, 'email' => 'gege@dsds.dsfge']);
});
