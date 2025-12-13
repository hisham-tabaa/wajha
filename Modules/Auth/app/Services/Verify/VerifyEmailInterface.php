<?php


namespace Modules\Auth\Services\Verify;

use Modules\Auth\Http\Requests\VerifyEmailRequest;

interface VerifyEmailInterface
{
    public function verify(VerifyEmailRequest $request): array;
    public function resendVerificationCode(string $email): array;
  
}