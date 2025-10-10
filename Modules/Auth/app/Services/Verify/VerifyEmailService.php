<?php
namespace Modules\Auth\Services\Verify;
use Modules\Auth\Models\EmailVerification;
use Modules\Auth\Models\User;
use Exception;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Modules\Auth\Http\Requests\VerifyEmailRequest;
use Illuminate\Support\Facades\Log;
class VerifyEmailService implements VerifyEmailInterface
{
    public function verify(VerifyEmailRequest $request): array
    {
        try {
            $email = $request->email;
            $code = $request->code;

            $verification = EmailVerification::
                where(['email'=> $email,'code'=> $code])
                ->where('expires_at', '>', Carbon::now())
                ->first();

            if (!$verification) {
                return [false, [], 400, 'Invalid or expired verification code.'];
            }

            $user = User::where('email', $email)->first();
            if (!$user) {
                return [false, [], 404, 'User not found.'];
            }

            // ✅ تحديث تأكيد الحساب
            $user->update(['confirmed_at' => now()]);

            // 🧹 حذف الكود بعد التحقق
            $verification->delete();

            return [true, [], 201, 'Email verified successfully.'];
        } catch (Exception $e) {
            Log::error('VerifyEmailService@verify', [
                'Message' => $e->getMessage(),
                'File' => $e->getFile(),
                'Line' => $e->getLine(),
            ]);
            return [false, [], 500, 'Failed to verify email.'];
        }
    }

        public function resendVerificationCode(string $email): array
        {
            $user = User::where('email',$email)->first();
            if(!$user){
                return [false,[],404,'This Email Not Found'];
            }
            $code = rand(100000, 999999);
                EmailVerification::create([
                'email' => $user->email,
                'code' => $code,
                'expires_at' => now()->addMinutes(10),
            ]);
            Mail::to($user->email)->send(new SendVerificationCode($code));

                return [true,[],201,'Code Sent Successfully'];
        }
}
