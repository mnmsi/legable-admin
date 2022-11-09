<?php

namespace App\Traits\User;

use App\Models\User\UserPaymentMethod;
use Stripe\StripeClient;

trait CardTrait
{
    public function create($data)
    {
        return UserPaymentMethod::create($data);
    }

    public function validateCard($cardInfo)
    {
        return $this->createToken($cardInfo);
    }

    private function createToken($data)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));
        return $stripe->tokens->create([
            'card' => [
                'number'    => $data['number'],
                'exp_month' => $data['exp_month'],
                'exp_year'  => $data['exp_year'],
                'cvc'       => $data['cvc'],
            ],
        ]);
    }
}
