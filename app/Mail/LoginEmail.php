<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $authorize;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($authorize)
    {
        $this->authorize = $authorize;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = Config('app.frontend_url');
        $loginlink = $url.'login/email/'.$this->authorize->token;

        return $this->from('noreply@regidital.com')
                    ->view('mail.login')
                    ->with(['link' => $loginlink]);
    }
}
