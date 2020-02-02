<?php

namespace App\Observers;

use App\Owner;
use App\Events\NewOrderEvent;


class OwnerObserver
{
    /**
     * Handle the owner "created" event.
     *
     * @param  \App\Owner  $owner
     * @return void
     */
    public function created(Owner $owner)
    {
    }

    /**
     * Handle the owner "updated" event.
     *
     * @param  \App\Owner  $owner
     * @return void
     */
    public function updated(Owner $owner)
    {
        //
    }

    /**
     * Handle the owner "deleted" event.
     *
     * @param  \App\Owner  $owner
     * @return void
     */
    public function deleted(Owner $owner)
    {
        //
    }

    /**
     * Handle the owner "restored" event.
     *
     * @param  \App\Owner  $owner
     * @return void
     */
    public function restored(Owner $owner)
    {
        //
    }

    /**
     * Handle the owner "force deleted" event.
     *
     * @param  \App\Owner  $owner
     * @return void
     */
    public function forceDeleted(Owner $owner)
    {
        //
    }
}
