<?php

namespace Modules\Auth\Services\UpdateProfile;

use Modules\Auth\Models\User;

class ProfileService implements ProfileServiceInterface
{
    public function updateProfile(User $user, array $data): array
    {
        try {
            $user->update($data);
            $user = $user->fresh(['role.permissions']);

            return [true, ['user' => $user], 200, 'Profile updated successfully'];
        } catch (\Exception $exception) {
            Log::error('ProfileService@updateProfile', [
                'File' => $exception->getFile(),
                'Line' => $exception->getLine(),
                'Message' => $exception->getMessage(),
            ]);

            return [false, [], 500, 'Failed to update profile'];
        }
    }
}

