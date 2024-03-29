<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Login;

class LogInEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $login;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Login $login)
    {
        $this->login = $login;
    }
}
