<?php

namespace App\Listeners;

use App\Events\PhoneVerificationEvent;
use App\Traits\System\VerificationTrait;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class PhoneVerificationEventListener
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
     * @param PhoneVerificationEvent $event
     * @return void
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function handle(PhoneVerificationEvent $event)
    {
        $generatedToken = $this->createToken('phone');

        if (!Str::contains($event->phone, '+880')) {
            $message = "Welcome to Legable. Here is your OTP: $generatedToken->otp";
            $this->sendOtpInMobile(Auth::user()->phone, $message);
        }
    }
}
