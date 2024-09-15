<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $mail;
    /**
     * Create a new message instance.
     */
    public function __construct($token,$mail)
    {
        $this->token = $token;
        $this->mail = $mail;
    }

    public function build(){
        return $this->view('admin.auth.passwords.password_reset_send',['mail' => $this->mail, 'token'=>$this->token]);
    }

}
