<?php

namespace App\Listeners;

use App\Events\ViolationCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToVerifier
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
     * @param  ViolationCreated  $event
     * @return void
     */
    public function handle(ViolationCreated $event)
    {
        //
    }
}
