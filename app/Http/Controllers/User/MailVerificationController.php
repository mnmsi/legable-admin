<?php

namespace App\Http\Controllers\User;

use App\Events\PhoneVerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Verification\MailRequest;
use App\Traits\System\VerificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('phone.verification');
    }
}
