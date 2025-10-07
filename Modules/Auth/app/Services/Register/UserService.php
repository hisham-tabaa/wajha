<?php

namespace Modules\Auth\Services\Register;

use Illuminate\Support\Str;
use Modules\Auth\Models\User;

class RegisterService implements RegisterInterface
{
    public function register(array $data): User
    {
        $data['id'] = Str::uuid(); 
        return User::create($data);
    }
}
