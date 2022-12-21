<?php

namespace App\Http\Controllers\User;

use App\Events\PhoneVerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\System\SubscriptionController;
use App\Http\Requests\User\CardRequest;
use App\Http\Requests\User\Verification\MailRequest;
use App\Traits\System\VerificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MailVerificationController extends Controller
{
    use VerificationTrait;

    public function showVerification()
    {
        return view('auth.verify_email', [
            'email' => Auth::user()->email
        ]);
    }

    public function verifyMail(MailRequest $request)
    {
        if (!$this->checkOtp($request->otp)) {
            return redirect()
                ->back()
                ->withErrors(["otp" => "Invalid OTP!!"])
                ->withInput();
        }

        Auth::user()->update(['email_verified_at' => now()]);

        if (Session::exists('subscriptionData')) {
            $data = json_decode(Session::get('subscriptionData'), true);
            Session::forget('subscriptionData');
            return (new SubscriptionController())->subscribe((new CardRequest())->merge((array)$data));
        }

        return redirect()->route('phone.verification');
    }
}
