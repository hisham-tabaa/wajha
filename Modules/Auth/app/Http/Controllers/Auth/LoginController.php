<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Services\Login\ILoginService;
use Modules\Auth\Transformers\UserResource\UserResource;

class LoginController extends Controller
{
    private ILoginService $loginService;

    public function __construct(ILoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(Request $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->loginService->login($request);

        return $status ?
            $this->successResponse(new UserResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
