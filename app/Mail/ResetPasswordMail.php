<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordMail extends Mailable // implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('email.request_password_email')
                    ->subject(trans('auth.email.password_reset'))
                    ->with(['token' => $this->data['token'], 'user' => $this->data['user']]);
    }
}
