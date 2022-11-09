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

    public function getFirstCard()
    {
        return UserPaymentMethod::first();
    }

    public function cards()
    {
        return UserPaymentMethod::get();
    }

    public function getActiveCard()
    {
        return $this->cards()->where('is_active', 1)
                    ->first();
    }

    public function getCard($id)
    {
        return UserPaymentMethod::find($this->decryptId($id));
    }

    public function decryptId($id)
    {
        return myDecrypt($id) ?? $id;
    }

    public function cardList()
    {
        return $this->cards()->map(function ($item) {
            return [
                'id'        => myEncrypt($item->id),
                'brand'     => $item->brand,
                'name'      => $item->name,
                'number'    => substr($item->number, -4),
                'is_active' => $item->is_active,
            ];
        });
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
