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
        $requestData                = $request->except('_token');
        $requestData['user_id']     = Auth::id();
        $requestData['plan_amount'] = 30;

        $subscribe = $this->payment($request->all());
        if (strtolower($subscribe->status) !== 'succeeded') {
            abort(404);
        }

        $requestData['brand'] = $subscribe->payment_method_details->card->brand;

        if (!$card = $this->updateOrCreate($requestData, $requestData)) {
            abort(404);
        }

        if (!$subsData = $this->subscribePlan($card->id)) {
            abort(404);
        }

        return redirect()->back();
    }
}
