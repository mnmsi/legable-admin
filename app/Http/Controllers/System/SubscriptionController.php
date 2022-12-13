<?php

namespace App\Http\Controllers\System;

use App\Events\MailVerificationEvent;
use App\Events\PhoneVerificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CardRequest;
use App\Traits\System\StripePaymentTrait;
use App\Traits\System\SubscriptionTrait;
use App\Traits\User\CardTrait;
use App\Traits\User\MailVerificationTrait;
use App\Traits\User\PhoneVerificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    use CardTrait, SubscriptionTrait, StripePaymentTrait, MailVerificationTrait, PhoneVerificationTrait;

    public function subscribe(CardRequest $request)
    {
        if ($this->checkPlan()) {
            return redirect()->route('myPlan.my-plan')
                             ->with("plan_exists", "Already subscribed plan!!");
        }

        try {
            $this->createToken($request->all());
        }
        catch (\Exception $exception) {
            return $this->returnException($exception->getMessage());
        }

        if (is_null(Auth::user()->email_verified_at)) {
            return $this->verifyMail($request);
        }

        if (is_null(Auth::user()->phone_verified_at)) {
            return $this->verifyPhone($request);
        }

        $requestData                = $request->except('_token');
        $requestData['user_id']     = Auth::id();
        $requestData['plan_amount'] = 30;

        try {
            $subscribe = $this->payment($requestData);
            if (strtolower($subscribe->status) !== 'succeeded') {
                abort(404);
            }

            $requestData['brand'] = $subscribe->payment_method_details->card->brand;

            if (!$card = $this->updateOrCreate([
                'user_id' => Auth::id(),
                'number'  => $request->number
            ], $requestData)) {
                abort(404);
            }

            $requestData['card_id'] = $card->id;

            if (!$subsData = $this->subscribePlan($requestData)) {
                abort(404);
            }

            return redirect()->route('myPlan.my-plan')
                             ->withSuccess('Successfully subscribed plan!!');
        }
        catch (\Exception $exception) {
            return $this->returnException($exception->getMessage());
        }
    }
}
