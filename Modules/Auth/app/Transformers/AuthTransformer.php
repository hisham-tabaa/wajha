<?php

namespace Modules\Auth\Transformers;

use App\Models\User;

class AuthTransformer
{
    public function transformLogin(array $data): array
    {
        /** @var User|null $user */
        $user = $data['user'] ?? null;
        $token = $data['token'] ?? null;
        $extra = $data['extra'] ?? [];

        return [
            'user' => $user ? [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
            ] : null,
            'token' => $token,
            'extra' => $extra,
        ];
    }
}
