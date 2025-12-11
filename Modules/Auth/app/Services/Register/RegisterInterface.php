<?php

namespace Modules\Auth\Services\Register;

use Modules\Auth\Http\Requests\RegisterRequest;

interface RegisterInterface
{
    public function register(RegisterRequest $request): array;
}
