<?php

namespace App\Traits\User;

use App\Events\PhoneVerificationEvent;
use Illuminate\Support\Facades\Session;

trait PhoneVerificationTrait
{
    public function verifyPhone($request)
    {
        Session::put('subscriptionData', json_encode($request->all()));
        event(new PhoneVerificationEvent());
        return redirect()->route('phone.verification');
    }
}
