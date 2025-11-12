<?php

namespace Modules\Auth\Services\UpdateProfile;

use Modules\Auth\Models\User;

class ProfileService implements ProfileServiceInterface
{
    public function updateProfile(User $user, array $data): User
    {
        $user->update($data);

        return $user;
    }
}

