<?php

namespace Modules\Auth\Services\Login;

use Illuminate\Http\Request;
use Modules\Auth\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService implements ILoginService
{
    public function login(Request $request): array
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (!$email || !$password) {
            return [false, ['error' => 'Email and password are required'], 422, 'Validation error'];
        }

        // Find user by email
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return [false, ['error' => 'Invalid credentials'], 401, 'Invalid credentials'];
        }

        // Load role and permissions
        $user->load(['role', 'permissions']);

        // Create token
        $token = $user->createToken('wejha-token')->plainTextToken;

        return [true, ['user' => $user, 'token' => $token], 200, 'Login successful'];
    }
}
