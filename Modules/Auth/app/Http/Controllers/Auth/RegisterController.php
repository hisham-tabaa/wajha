<?php

namespace Modules\Auth\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\Register\RegisterInterface;

class RegisterController extends Controller
{
    protected RegisterInterface $userService;

    public function __construct(RegisterInterface $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->userService->register($request->validated());

        return response()->json([
            'message' => 'User registered successfully.',
            'data' => $user,
        ], 201);
    }
}
