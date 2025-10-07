<?php

  // لاحظ Api وليس API
namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Auth\App\Http\Request\RegisterUserRequest;
use Modules\Auth\App\Interfaces\AuthServiceInterface;

class RegisterController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $result = $this->authService->register($request->validated());

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
                'error' => config('app.debug') ? $result['error'] : null
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => $result['message'],
            'data' => [
                'user' => $this->authService->formatUserResponse($result['user']),
                'access_token' => $result['token'],
                'token_type' => 'Bearer',
            ]
        ], 201);
    }
}