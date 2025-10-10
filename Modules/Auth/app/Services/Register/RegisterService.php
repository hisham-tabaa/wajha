<?php

namespace Modules\Auth\Services\Register;

use Exception;
use Illuminate\Support\Str;
use Modules\Auth\Models\User;
use Modules\Auth\Models\EmailVerification;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Mail\SendVerificationCode;
use Illuminate\Support\Facades\Mail;

class RegisterService implements RegisterInterface
{
    public function register(RegisterRequest $request): array
    {
        try {
            $data = $request->validated();
            $role = Role::where('name', 'default')->first();
            $data['role_id'] = $role->id;
       if (!$role) {
                return [false, [], 404, "The Role(default) not found"];
            } 
            $user =  User::create($data);
            if($user){
            (new VerifyEmailService())->resendVerificationCode($user->email);

            }
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
