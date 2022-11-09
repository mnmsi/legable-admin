<?php

namespace App\Traits\System;

use App\Models\Subscription\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait SubscriptionTrait
{
    public function subscribePlan($data)
    {
        return Subscription::create([
            'plan_id'     => 2,
            'card_id'     => $data['card_id'],
            'plan_amount' => $data['plan_amount'],
            'expires_at'  => now()->addMonth()->format("Y-m-d")
        ]);
    }

    public function checkPlan()
    {
        return Subscription::where('expires_at', '>=', now()->format("Y-m-d"))->first();
    }

    public function checkTrial()
    {
        $now              = now()->format("Y-m-d");
        $userRegisteredAt = Carbon::parse(Auth::user()->created_at)->addDays(15)->format("Y-m-d");

        if ($now > $userRegisteredAt) {
            return false;
        }

        return true;
    }
}
