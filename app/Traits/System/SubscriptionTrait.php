<?php

namespace App\Traits\System;

use App\Models\Subscription\Subscription;

trait SubscriptionTrait
{
    public function subscribePlan($cardId)
    {
        return Subscription::create([
            'plan_id'    => 2,
            'card_id'    => $cardId,
            'expires_at' => now()->addMonth()
        ]);
    }
}
