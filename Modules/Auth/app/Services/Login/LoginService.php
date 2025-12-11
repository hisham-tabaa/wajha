<?php

namespace Modules\Auth\Services\Login;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Models\User;

class LoginService implements ILoginService
{
    public function login(Request $request): array
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');

            // Find user by email
            $user = User::where('email', $email)->first();

            if (! $user) {
                return [false, ['error' => 'Invalid credentials'], 400, 'Invalid credentials'];
            }

            if (! Hash::check($password, $user->password)) {
                return [false, ['error' => 'Invalid credentials'], 400, 'Invalid credentials'];
            }

            // Validation if user have verification email
            if (! $user->confirmed_at) {
                return [false, ['error' => 'Email not verified'], 400, 'Email not verified'];
            }

            // Load role and permissions
            $user->load(['role', 'permissions']);

            // Create token
            $token = $user->createToken('wejha-token-plain-text')->plainTextToken;

            return [true, ['user' => $user, 'token' => $token], 201, 'Login successful'];
        } catch (Exception $e) {
            Log::error('LoginService@login', [
                'Message' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ]);
            throw $e;
        }
    }
}
