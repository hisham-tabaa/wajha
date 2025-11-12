<?php

namespace Modules\Auth\App\Transformers\UserResource;

use Modules\Auth\Models\User;

class UserTransformer
{
    public static function transform(User $user): array
    {
        return [
            'id'            => $user->id,
            'first_name'    => $user->first_name,
            'last_name'     => $user->last_name,
            'email'         => $user->email,
            'avatar'        => $user->avatar,
            'gender'        => $user->gender,
            'birthday'      => $user->birthday,
            'phone'         => $user->phone,
            'nationalty_id' => $user->nationalty_id,
        ];
    }
}
