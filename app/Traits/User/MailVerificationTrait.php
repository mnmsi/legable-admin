<?php

namespace App\Traits\User;

use App\Events\MailVerificationEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait MailVerificationTrait
{
    public function verifyMail($request)
    {
        Session::put('subscriptionData', json_encode($request->all()));
        event(new MailVerificationEvent(Auth::user()));
        return redirect()->route('mail.verification');
    }
}
