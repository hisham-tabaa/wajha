<?php

namespace Modules\Auth\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\Register\RegisterInterface;
use Modules\Auth\Transformers\UserResource\UserResource;

class RegisterController extends Controller
{
    protected RegisterInterface $userService;

    public function __construct(RegisterInterface $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->userService->register($request);
        return $status ?
            $this->successResponse(new UserResource($data), $code, $message)
            : $this->errorResponse($data, $code, $message);
    }
}
