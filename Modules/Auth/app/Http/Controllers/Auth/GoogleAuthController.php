<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Http\Requests\Google\GoogleLoginRequest;
use Modules\Auth\Services\GoogleAuth\IGoogleAuthService;
use Modules\Auth\Transformers\UserResource\UserResource;

class GoogleAuthController extends Controller
{
    private IGoogleAuthService $googleAuthService;

    public function __construct(IGoogleAuthService $googleAuthService)
    {
        $this->googleAuthService = $googleAuthService;
    }

    public function loginWithGoogleToken(GoogleLoginRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->googleAuthService->loginWithGoogleToken($request);

        return $status ?
            $this->successResponse(new UserResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
