<?php

namespace App\Traits\User;

use App\Events\PhoneVerificationEvent;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

trait PhoneVerificationTrait
{
    public function verifyPhone($request)
    {
        Session::put('subscriptionData', json_encode($request->all()));
        event(new PhoneVerificationEvent());
        return redirect()->route('phone.verification');
    }

    public function phoneLookUp($number)
    {
        $client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        return $client->lookups->v1->phoneNumbers($number)->fetch(["type" => ["carrier"]])->carrier;
    }

    public function returnExceptionPhoneValidation($error)
    {
        return redirect()
            ->back()
            ->withErrors($error)
            ->withInput();
    }
}
