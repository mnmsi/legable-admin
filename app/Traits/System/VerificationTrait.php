<?php

namespace App\Traits\System;

use App\Models\System\UserVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

trait VerificationTrait
{
    public function create($data)
    {
        return UserVerification::create($data);
    }

    public function createToken($userId, $gateway)
    {
        return $this->create($this->makeData($userId, $gateway));
    }

    public function makeData($userId, $gateway)
    {
        return [
            'user_id'    => $userId,
            'gateway'    => $gateway,
            'otp'        => $this->generateToken(),
            'expires_at' => now()->addMinutes(5),
        ];
    }

    public function generateToken()
    {
        return rand(000000, 999999);
    }

    public function getRequestedOtpDetails($otp)
    {
        return UserVerification::where('user_id', Auth::id())
                               ->where('otp', $otp)
                               ->first();
    }

    public function checkOtp($otp)
    {
        $generatedOtp = $this->getRequestedOtpDetails($otp);

        if ($otp != $generatedOtp->otp) {
            return false;
        }

        if (now()->gt(Carbon::parse($generatedOtp->expires_at))) {
            return false;
        }

        return true;
    }

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     * @throws ConfigurationException
     * @throws TwilioException
     */
    private function sendOtpInMobile($recipients, $message)
    {
        $account_sid   = getenv("TWILIO_SID");
        $auth_token    = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");

        $client = new Client($account_sid, $auth_token);
        return $client->messages->create("+$recipients",
            ['from' => $twilio_number, 'body' => $message]);
    }
}
