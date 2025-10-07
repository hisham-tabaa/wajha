<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Interfaces\UserServiceInterface;

class UserRegisterController extends Controller
{
    protected UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
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
