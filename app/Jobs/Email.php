<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderReceipt;
use App\Models\Owner;

class Email implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $owner;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Owner $owner)
    {
        $this->owner = $owner;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->owner->user->email)->send(new NewOrderReceipt($this->owner));
    }
}
