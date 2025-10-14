<?php
namespace  Modules\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Sendverificationcode extends Mailable implements ShouldQueue
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
    return $this->subject('Your Verification Code')
    ->view('auth::emails.verification-code')
    ->with([
        'code' => $this->code,
        'email' => $this->email,
    ]);

        }

   
}