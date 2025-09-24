<?php

namespace Modules\Auth\Services\GoogleAuth;

use Illuminate\Http\Request;

interface IGoogleAuthService
{
    /**
     * Handle Google login using a Firebase ID token.
     *
     * Returns [bool $success, mixed $data, int $statusCode, string $message]
     */
    public function login(Request $request): array;
}
