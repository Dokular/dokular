<?php

namespace App\Providers;

use App\Events\NewOrderEvent;
use App\Listeners\SendEmailReceiptToUser;
use App\Listeners\SendEmailNotificationToAdmin;
use App\Listeners\CreateOrderDeliveryAddress;
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
            // SendEmailNotificationToAdmin::class,
            // CreateOrderDeliveryAddress::class,
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
