<?php

namespace Modules\Auth\Services\Register;

use Exception;
use Illuminate\Support\Str;
use Modules\Auth\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Requests\RegisterRequest;

class RegisterService implements RegisterInterface
{
    public function register(RegisterRequest $request): array
    {
        try {
            $data = $request->validated();
            $data['role_id'] = Role::where('name', 'default')->first()->id;
            $user =  User::create($data);
            return [true, ['user' => $user], 201, 'Register done successfully'];
        } catch (Exception $e) {
            Log::error("RegisterService@register", [
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
                'Message' => $e->getMessage(),
            ]);
            return [false, [], 500, 'Failed to Register'];
        }
    }
}
