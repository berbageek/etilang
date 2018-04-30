<?php

namespace App\Listeners;

use App\Events\ViolationCreated;
use App\Notifications\ViolationCreatedVerifier;
use App\User;
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
        /**
         * Notifikasi ke Verifikator
         *
         * @var User $verifier
         */
        $violation = $event->violation;

        $verifier = User::whereHas('roles', function ($query) {
            $query->where('name', 'Verifikator');
        })->first();

        $verifier->notify(new ViolationCreatedVerifier($violation));
    }
}
