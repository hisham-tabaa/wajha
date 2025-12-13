<?php

namespace Modules\Auth\Services\Verify;

use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Http\Requests\VerifyEmailRequest;
use Modules\Auth\Mail\Sendverificationcode;
use Modules\Auth\Models\EmailVerification;
use Modules\Auth\Models\User;

class VerifyEmailService implements VerifyEmailInterface
{
    /**
     * التحقق من صحة رمز التحقق المرسل إلى البريد الإلكتروني.
     */
    public function verify(VerifyEmailRequest $request): array
    {
        try {
            $email = $request->email;
            $code = $request->code;

            // 🔍 البحث عن الكود والتحقق من صلاحيته
            $verification = EmailVerification::where([
                'email' => $email,
                'code' => $code,
            ])->where('expires_at', '>', Carbon::now())->first();

            if (! $verification) {
                return [false, [], 400, 'رمز التحقق غير صالح أو منتهي الصلاحية.'];
            }

            // 🧍‍♂️ التحقق من وجود المستخدم
            $user = User::where('email', $email)->first();
            if (! $user) {
                return [false, [], 404, 'المستخدم غير موجود.'];
            }

            // ✅ تحديث حالة تأكيد الحساب
            $user->update(['confirmed_at' => now()]);

            // 🧹 حذف الكود بعد نجاح التحقق
            $verification->delete();
            return [
                true,
                [],
                201,
                __('auth::messages.email_verified_successfully')
            ];
        } catch (Exception $e) {
            Log::error('VerifyEmailService@verify', [
                'Message' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ]);

            return [false, [], 500, 'فشل في التحقق من البريد الإلكتروني.'];
        }
    }

    /**
     * إعادة إرسال رمز التحقق إلى البريد الإلكتروني.
     */
    public function resendVerificationCode(string $email): array
    {
        try {
            $user = User::where('email', $email)->first();

            if (!$user) {
                return [
                    false,
                    [],
                    404,
                    __('auth::messages.user_not_found')
                ];
            }

            // 🔢 إنشاء رمز تحقق جديد
            $code = rand(100000, 999999);

            EmailVerification::create([
                'email' => $user->email,
                'code' => $code,
                'expires_at' => now()->addMinutes(10),
            ]);

            // ✉️ إرسال البريد الإلكتروني
            Mail::to($user->email)->queue(new Sendverificationcode($code, $user->email));

            return [true, [], 201, 'تم إرسال رمز التحقق بنجاح إلى بريدك الإلكتروني.'];
        } catch (Exception $e) {
            Log::error('VerifyEmailService@resendVerificationCode', [
                'Message' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ]);

            return [false, [], 500, 'فشل في لرسال كود التحقق من البريد الإلكتروني.'];
        }
    }
}
