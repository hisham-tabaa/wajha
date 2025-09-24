<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Services\Interfaces\IGoogleAuthService;
use Modules\Auth\Transformers\AuthTransformer;

class GoogleAuthController extends Controller
{
    public function __construct(
        private IGoogleAuthService $googleAuthService,
        private AuthTransformer $transformer,
    ) {}

    public function login(string $role = 'default', Request $request): JsonResponse
    {
        [$status, $data, $code, $message] = $this->googleAuthService->login($role, $request);

        if ($status) {
            return response()->json(
                $this->transformer->transformLogin($data) + ['message' => $message],
                $code
            );
        }

        return response()->json(
            ['error' => $data['error'] ?? 'Authentication failed', 'message' => $message],
            $code
        );
    }
}
