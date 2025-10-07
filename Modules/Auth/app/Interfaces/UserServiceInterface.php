<?php

namespace Modules\Auth\Interfaces;

use Modules\Auth\Models\User;

interface UserServiceInterface
{
    public function register(array $data): User;
}
