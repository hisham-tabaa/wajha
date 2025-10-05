<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Auth\Transformers\UserResource\UserResource;
use Modules\Auth\Services\GoogleAuth\IGoogleAuthService;

class GoogleAuthController extends Controller
{
    public function __construct(
        private IGoogleAuthService $googleAuthService,
    ) {}

    public function login(Request $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->googleAuthService->login($request);

        return $status ?
            $this->successResponse(new UserResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
