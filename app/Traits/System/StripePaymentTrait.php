<?php

namespace App\Traits\System;

use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\StripeClient;

trait StripePaymentTrait
{
    public function validateCard($cardInfo)
    {
        return $this->createToken($cardInfo);
    }

    public function createToken($data)
    {
        $stripe = new StripeClient(getenv('STRIPE_SECRET'));
        return $stripe->tokens->create([
            'card' => [
                'number'    => $data['number'],
                'exp_month' => $data['exp_month'],
                'exp_year'  => $data['exp_year'],
                'cvc'       => $data['cvc'],
            ],
        ]);
    }

    public function payment($data)
    {
        $stripe = new StripeClient(getenv('STRIPE_SECRET'));
        return $stripe->charges->create([
            "amount"      => ceil($data['plan_amount'] * 100),
            "currency"    => getenv('STRIPE_CURRENCY'),
            "source"      => $this->createToken($data),
            "description" => "Name: " . (Auth::user()->name ?? $data['name']) . ", Email: " . Auth::user()->email,
        ]);
    }

    public function returnException($msg)
    {
        return redirect()
            ->route('myPlan.my-plan')
            ->withErrors(["invalidCard" => $msg])
            ->withInput();
    }
}
