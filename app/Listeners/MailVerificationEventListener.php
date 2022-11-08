<?php

namespace App\Listeners;

use App\Events\MailVerificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MailVerificationEventListener
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
     * @param  \App\Events\MailVerificationEvent  $event
     * @return void
     */
    public function handle(MailVerificationEvent $event)
    {
        //
    }
}
