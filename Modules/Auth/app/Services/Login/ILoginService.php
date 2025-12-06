<?php

namespace Modules\Auth\Services\Login;

use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\LoginRequest;

interface ILoginService
{
    /**
     * Handle user login using email and password.
     *
     * Returns [bool $success, mixed $data, int $statusCode, string $message]
     */
    public function login(LoginRequest $request): array;
}
