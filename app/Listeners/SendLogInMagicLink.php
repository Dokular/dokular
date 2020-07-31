<?php

namespace App\Listeners;

use App\Events\LogInEvent;
use App\Jobs\LoginEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LogInMail;


class SendLogInMagicLink
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LogInEvent  $event
     * @return void
     */
    public function handle(LogInEvent $event)
    {
        //dispatch(new LoginEmail($event));
        //Mail::to($event->login->email)->send(new LogInMail($event->login));
    }
}
