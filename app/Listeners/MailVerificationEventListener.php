<?php

namespace App\Listeners;

use App\Events\MailVerificationEvent;
use App\Notifications\MailVerificationNotification;
use App\Traits\System\VerificationTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MailVerificationEventListener
{
    use VerificationTrait;

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
     * @param MailVerificationEvent $event
     * @return void
     */
    public function handle(MailVerificationEvent $event)
    {
        $verification = $this->createToken($event->user->id, 'mail');

        $event->user->notify(new MailVerificationNotification($verification->otp));
    }
}
