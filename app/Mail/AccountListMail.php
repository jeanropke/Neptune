<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountListMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('email.request_accounts')
                    ->subject(trans('auth.email.account_lists'))
                    ->with(['email' => $this->data['email'], 'users' => $this->data['users']]);
    }
}
