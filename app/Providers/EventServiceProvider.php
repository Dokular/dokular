<?php

namespace App\Providers;

use Illuminate\Auth\Events\NewOrderEvent;
use Illuminate\Auth\Listeners\SendEmailReceiptToUser;
use Illuminate\Auth\Listeners\SendEmailNotificationToAdmin;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewOrderEvent::class => [
            SendEmailReceiptToUser::class,
            SendEmailNotificationToAdmin::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
