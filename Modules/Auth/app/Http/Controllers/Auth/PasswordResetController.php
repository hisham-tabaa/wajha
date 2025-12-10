<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Http\Requests\PasswordResetRequest;
use Modules\Auth\Http\Requests\RequestPasswordResetRequest;
use Modules\Auth\Http\Requests\VerifyPasswordResetCodeRequest;
use Modules\Auth\Services\PasswordReset\PasswordResetInterface;

class PasswordResetController extends Controller
{
    public function __construct(private readonly PasswordResetInterface $passwordResetService) {}

    public function requestReset(RequestPasswordResetRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->passwordResetService->requestReset($request->validated());

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function verifyCode(VerifyPasswordResetCodeRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->passwordResetService->verifyCode($request->validated());

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function reset(PasswordResetRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->passwordResetService->reset($request->validated());

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
