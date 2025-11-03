<?php

namespace Modules\Auth\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Auth\Services\UpdateProfile\ProfileServiceInterface;
use Modules\Auth\App\Transformers\UserResource\UserTransformer;
use Modules\Auth\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    protected ProfileServiceInterface $profileService;

    public function __construct(ProfileServiceInterface $profileService)
    {
        $this->profileService = $profileService;
    }

    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $updatedUser = $this->profileService->updateProfile($user, $request->validated());

        return response()->json([
            'data' => UserTransformer::transform($updatedUser),
        ]);
    }
}
