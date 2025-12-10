<?php

namespace Modules\Auth\Services\PasswordReset;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Mail\SendVerificationCode;
use Modules\Auth\Models\EmailVerification;
use Modules\Auth\Models\User;

class PasswordResetService implements PasswordResetInterface
{
    private const CODE_TTL_MINUTES = 10;

    public function requestReset(array $payload): array
    {
        try {
            $email = $payload['email'];

            /** @var User|null $user */
            $user = User::where('email', $email)->first();
            if (! $user) {
                return [false, [], 404, 'User not found.'];
            }

            $code = random_int(100000, 999999);

            EmailVerification::updateOrCreate(
                ['email' => $email],
                [
                    'code' => $code,
                    'expires_at' => Carbon::now()->addMinutes(self::CODE_TTL_MINUTES),
                ]
            );

            Mail::to($email)->queue(new SendVerificationCode((string) $code, $email));

            return [true, [], 200, 'Password reset code sent successfully.'];
        } catch (Exception $exception) {
            Log::error('PasswordResetService@requestReset', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to send reset code.'];
        }
    }

    public function verifyCode(array $payload): array
    {
        try {
            $email = $payload['email'];
            $code = $payload['code'];

            $verification = EmailVerification::where('email', $email)
                ->where('code', $code)
                ->where('expires_at', '>', Carbon::now())
                ->first();

            if (! $verification) {
                return [false, [], 400, 'Invalid or expired reset code.'];
            }

            return [true, [], 200, 'Reset code verified successfully.'];
        } catch (Exception $exception) {
            Log::error('PasswordResetService@verifyCode', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to verify reset code.'];
        }
    }

    public function reset(array $payload): array
    {
        try {
            $email = $payload['email'];
            $code = $payload['code'];
            $password = $payload['password'];

            return DB::transaction(function () use ($email, $code, $password) {
                $verification = EmailVerification::where('email', $email)
                    ->where('code', $code)
                    ->where('expires_at', '>', Carbon::now())
                    ->lockForUpdate()
                    ->first();

                if (! $verification) {
                    return [false, [], 400, 'Invalid or expired reset code.'];
                }

                /** @var User|null $user */
                $user = User::where('email', $email)->first();
                if (! $user) {
                    return [false, [], 404, 'User not found.'];
                }

                $user->update(['password' => Hash::make($password)]);

                $verification->delete();

                return [true, [], 200, 'Password reset successfully.'];
            });
        } catch (Exception $exception) {
            Log::error('PasswordResetService@reset', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);

            return [false, [], 500, 'Unable to reset password.'];
        }
    }
}
