<?php

namespace Modules\Auth\Services\GoogleAuth;

use Illuminate\Http\Request;
use Modules\Auth\Models\User;
use Firebase\Auth\Token\Verifier;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Firebase\Auth\Token\Exception\InvalidToken;

class GoogleAuthService implements IGoogleAuthService
{
    public function login(Request $request): array
    {
        $idToken = $request->input('id_token');
        if (!$idToken) {
            return [false, ['error' => 'id_token is required'], 422, 'Validation error'];
        }

        try {
            $verifier = new Verifier(env('FIREBASE_PROJECT_ID'));
            $verifiedIdToken = $verifier->verifyIdToken($idToken);

            $uid = $verifiedIdToken->getClaim('sub');
            $email = $verifiedIdToken->getClaim('email');
            $name = $verifiedIdToken->getClaim('name');
            $picture = $verifiedIdToken->getClaim('picture');
            $role = Role::where('name', 'default')->first();
            // Create or get user
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'first_name' => $name,
                    'last_name' => null,
                    'avatar' => null,
                    'gender' => null,
                    'last_sign_in_at' => now(),
                    'nationalty_id' => null,
                    'birthday' => null,
                    'phone' => null,
                    'confirmed_at' => now(),
                    'google_id' => $uid,
                    'role_id' => $role->id,
                    'password' => str()->random(16),
                ]
            );
            $user->assignRole($role->name);
            $user->load(['role', 'permissions']);

            // Token strategy: if Sanctum installed, issue token; otherwise return null
            $token = null;
            if (method_exists($user, 'createToken')) {
                $token = $user->createToken('wejha-token-plain-text')->plainTextToken;
            }

            return [true, ['user' => $user, 'token' => $token], 201, 'Authenticated successfully'];
        } catch (InvalidToken $e) {
            return [false, ['error' => 'Invalid token'], 401, 'Invalid token'];
        } catch (\InvalidArgumentException $e) {
            return [false, ['error' => 'Malformed token'], 401, 'Malformed token'];
        } catch (\Throwable $e) {
            Log::error('Google auth error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return [false, ['error' => 'Server error'], 500, 'Server error'];
        }
    }
}
