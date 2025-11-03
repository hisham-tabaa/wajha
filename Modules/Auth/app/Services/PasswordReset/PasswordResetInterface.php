<?php

namespace Modules\Auth\Services\PasswordReset;

interface PasswordResetInterface
{
    /**
     * Handle creating and delivering a reset code to the user.
     */
    public function requestReset(array $payload): array;

    /**
     * Verify that the supplied code is valid and not expired.
     */
    public function verifyCode(array $payload): array;

    /**
     * Reset the user's password after verifying the code.
     */
    public function reset(array $payload): array;
}
