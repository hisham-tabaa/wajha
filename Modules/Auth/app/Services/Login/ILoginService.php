<?php

namespace Modules\Auth\Services\Login;

use Illuminate\Http\Request;

interface ILoginService
{
    /**
     * Handle user login using email and password.
     *
     * Returns [bool $success, mixed $data, int $statusCode, string $message]
     */
    public function login(Request $request): array;
}
