<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CardRequest;
use App\Traits\System\StripePaymentTrait;
use App\Traits\System\SubscriptionTrait;
use App\Traits\User\CardTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    use CardTrait, SubscriptionTrait, StripePaymentTrait;

    public function subscribe(CardRequest $request)
    {
        if ($this->checkPlan()) {
            return redirect()->back()
                             ->with("plan_exists", "Already subscribed plan!!");
        }

//        if (is_null(Auth::user()->email_verified_at)) {
//            return redirect()->route('mail.verification');
//        }
//
//        if (is_null(Auth::user()->phone_verified_at)) {
//            return redirect()->route('phone.verification');
//        }

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

            return redirect()->back();
        }
        catch (\Exception $exception) {
            return redirect()
                ->back()
                ->withErrors(["invalidCard" => $exception->getMessage()]);
        }
    }
}
