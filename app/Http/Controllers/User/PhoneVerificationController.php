<?php

namespace App\Http\Controllers\User;

use App\Events\PhoneVerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Verification\PhoneRequest;
use App\Traits\System\VerificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{
    use VerificationTrait;

    public function showVerification()
    {
        return view('auth.verify_phone', [
            'phone' => Auth::user()->phone
        ]);
    }

    public function verifyPhone(PhoneRequest $request)
    {
        if (!$this->checkOtp($request->otp)) {
            return redirect()
                ->back()
                ->withErrors(["otp" => "Invalid OTP!!"])
                ->withInput();
        }

        Auth::user()->update(['phone_verified_at' => now()]);

        return redirect()->route('dashboard');
    }
}
