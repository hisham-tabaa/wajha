<?php

namespace Modules\Auth\Services\GoogleAuth;

use Exception;
use Google_Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Auth\Models\User;
use Firebase\Auth\Token\Verifier;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Firebase\Auth\Token\Exception\InvalidToken;

class GoogleAuthService implements IGoogleAuthService
{
    public function loginWithGoogleToken(Request $request): array
    {
        try {
            $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]); // verify the same client_id
            $payload = $client->verifyIdToken($request->id_token);

            if (!$payload) {
                return [false,  [], 401, 'Invalid Google token'];
            }

            $uid = $payload['sub'];
            $email = $payload['email'];
            $name = $payload['name'];
            $role = Role::where('name', 'default')->first();
            if (!$role) {
                return [false, [], 400, "The Role(default) not found"];
            }

            $user = User::where(['email' => $email])->first();
            if (!$user) {
                $user = User::create(
                    [
                        'email' => $email,
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
            }
            Log::info('user,role', [$user, $role]);
            $user->load(['role', 'permissions']);

            // Token strategy: if Sanctum installed, issue token; otherwise return null
            $token = null;
            $token = $user->createToken('wejha-token-plain-text')->plainTextToken;
            return [true, ['user' => $user, 'token' => $token], 201, 'Authenticated successfully'];
        } catch (Exception $e) {
            Log::error('Custom error message', [
                'file' => $e->getFile(),     // اسم الملف اللي حصل فيه الخطأ
                'line' => $e->getLine(),     // رقم السطر
                'message' => $e->getMessage() // رسالة الخطأ
            ]);
            return [false, [], 500, 'Google authentication failed'];
        }
    }
}
