<?php

namespace App\Traits\System;

use App\Models\Subscription\Subscription;

trait SubscriptionTrait
{
    public function subscribePlan($data)
    {
        return Subscription::create([
            'plan_id'     => 2,
            'card_id'     => $data['card_id'],
            'plan_amount' => $data['plan_amount'],
            'expires_at'  => now()->addMonth()
        ]);
    }
}
