<?php

namespace Modules\Auth\Services\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;

class LoginService implements ILoginService
{
    public function login(Request $request): array
    {
        // TODO try and catch and logg if error filr,line,message   Note:From Awad TO ABD
        $email = $request->input('email');
        $password = $request->input('password');

        // TODO Validations from Request not here as 'GoogleLoginRequest'   Note:From Awad TO ABD
        if (! $email || ! $password) {
            return [false, ['error' => 'Email and password are required'], 422, 'Validation error'];
        }

        // Find user by email
        $user = User::where('email', $email)->first();
        //  TODO  Validation if user have virification email    Note:From Awad TO ABD
        // TODO Return Code is 400 -> it bad request not user not auth     Note:From Awad TO ABD

        if (! $user || ! Hash::check($password, $user->password)) {
            return [false, ['error' => 'Invalid credentials'], 401, 'Invalid credentials'];
        }

        // Load role and permissions
        $user->load(['role', 'permissions']);

        //  TODO use wejha-token-plain-text insted of wejha-token     Note:From Awad TO ABD
        // Create token
        $token = $user->createToken('wejha-token')->plainTextToken;

        // TODO Return Code is 201 ->alter on database     Note:From Awad TO ABD
        return [true, ['user' => $user, 'token' => $token], 200, 'Login successful'];
    }
}
