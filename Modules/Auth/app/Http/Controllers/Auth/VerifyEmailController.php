<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Http\Requests\SendVerificationCodeRequest;
use Modules\Auth\Http\Requests\VerifyEmailRequest;
use Modules\Auth\Services\Verify\VerifyEmailInterface;

class VerifyEmailController extends Controller
{
    protected VerifyEmailInterface $verifyService;

    public function __construct(VerifyEmailInterface $verifyService)
    {
        $this->verifyService = $verifyService;
    }

    public function verify(VerifyEmailRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->verifyService->verify($request);

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }

    public function sendVerificationCode(SendVerificationCodeRequest $request): JsonResponse
    {
        $request->validated();
        [$status, $data, $code, $message] = $this->verifyService->resendVerificationCode($request->email);

        return $status
            ? $this->successResponse($data, $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
