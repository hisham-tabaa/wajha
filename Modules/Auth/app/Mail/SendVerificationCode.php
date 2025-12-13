<?php

namespace Modules\Auth\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerificationCode extends Mailable implements ShouldQueue
{
  use Queueable, SerializesModels;

  public string $code;
  public string $email;

  public function __construct(string $code, string $email)
  {
    $this->code = $code;
    $this->email = $email;
  }

  public function build()
  {
    try {
      return $this->subject('رمز التحقق من البريد الإلكتروني')
        ->view('auth::emails.verification-code')
        ->with([
          'code' => $this->code,
          'email' => $this->email,
        ]);
    } catch (Exception $e) {
      Log::error('Send Verification Code::MAIL', [
        'Message' => $e->getMessage(),
        'File' => $e->getFile(),
        'Line' => $e->getLine(),
      ]);
      throw $e;
    }
  }
}
