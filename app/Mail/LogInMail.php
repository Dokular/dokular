<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogInMail extends Mailable
{
    use Queueable, SerializesModels;

    public $login;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($login)
    {
        $this->login = $login;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = Config('app.frontend_url');
        $loginlink = $url.'login/email/'.$this->login->token;
        return $this->markdown('emails.auth.login')
                    ->from('noreply@dokular.com')
                    ->subject('Sign in link')
                    ->with('url', $loginlink );;
    }
}
