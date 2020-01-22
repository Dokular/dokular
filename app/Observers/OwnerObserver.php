<?php

namespace App\Observers;

use App\Owner;

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
        // $owner->delivery()->create([
        //     'phone',
        //     'address',
        //     'state',
        //     'lga',
        //     'charge'
        // ]);
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
