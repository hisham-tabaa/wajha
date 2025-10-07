<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Str;
use Modules\Auth\Interfaces\UserServiceInterface;
use Modules\Auth\Models\User;

class UserService implements UserServiceInterface
{
    public function register(array $data): User
    {
        $data['id'] = Str::uuid(); 
        return User::create($data);
    }
}
