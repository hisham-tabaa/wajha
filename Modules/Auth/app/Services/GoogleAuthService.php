<?php

namespace Modules\Auth\Services;

use App\Models\User;
use Firebase\Auth\Token\Verifier;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Services\Interfaces\IGoogleAuthService;

class GoogleAuthService implements IGoogleAuthService
{
    public function login(string $role, Request $request): array
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

            // Create or get user
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'google_id' => $uid,
                    'avatar' => $picture,
                    'password' => bcrypt(str()->random(16)),
                ]
            );

            // Token strategy: if Sanctum installed, issue token; otherwise return null
            $token = null;
            if (method_exists($user, 'createToken')) {
                $token = $user->createToken('auth_token')->plainTextToken;
            }

            $extra = ['role' => $role];

            return [true, compact('user', 'token', 'extra'), 200, 'Authenticated successfully'];
        } catch (InvalidToken $e) {
            return [false, ['error' => 'Invalid token'], 401, 'Invalid token'];
        } catch (\InvalidArgumentException $e) {
            return [false, ['error' => 'Malformed token'], 401, 'Malformed token'];
        } catch (\Throwable $e) {
            Log::error('Google auth error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return [false, ['error' => 'Server error'], 500, 'Server error'];
        }
    }
}
