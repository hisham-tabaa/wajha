<?php

namespace Modules\Auth\Services\UpdateProfile;

use Modules\Auth\Models\User;

interface ProfileServiceInterface
{
    public function updateProfile(User $user, array $data): array;
}
