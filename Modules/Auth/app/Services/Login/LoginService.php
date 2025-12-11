<?php

namespace Modules\Auth\Services\Login;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;
use Modules\Auth\Http\Requests\LoginRequest;

class LoginService implements ILoginService
{
    public function login(LoginRequest $request): array
    {
        try {
            $validated = $request->validated();
            $email = $validated['email'];
            $password = $validated['password'];

            // Find user by email
            $user = User::where('email', $email)->first();

            // Check if user exists validate email
            if (!$user) {
                return [
                    false,
                    ['error' => __('auth::messages.email_incorrect')],
                    401,
                    __('auth::messages.email_incorrect')
                ];
            }

            // Check if password is correct
            if (!Hash::check($password, $user->password)) {
                return [
                    false,
                    ['error' => __('auth::messages.password_incorrect')],
                    401,
                    __('auth::messages.password_incorrect')
                ];
            }

            // Check if email is verified (if required)
            // if (!$user->hasVerifiedEmail()) {
            //     return [
            //         false,
            //         [],
            //         403,
            //         __('auth::messages.email_not_verified')
            //     ];
            // }

            // Load role and permissions
            $user->load(['role', 'permissions']);

            // Create token
            $token = $user->createToken('wejha-token-plain-text')->plainTextToken;

            return [
                true,
                [
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer'
                ],
                200,
                __('auth::messages.login_success')
            ];
        } catch (Exception $e) {
            Log::error("LoginService@login", [
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
                'Message' => $e->getMessage(),
            ]);

            return [
                false,
                [],
                500,
                __('auth::messages.login_failed')
            ];
        }
    }
}
