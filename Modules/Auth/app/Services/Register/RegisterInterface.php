<?php

namespace Modules\Auth\Services\Register;

use Modules\Auth\Models\User;

interface RegisterInterface
{
    public function register(array $data): User;
}
