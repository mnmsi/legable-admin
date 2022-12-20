<?php

use App\Models\Subscription\Subscription;

function check_plan()
{
    return Subscription::where('expires_at', '>=', now()->format("Y-m-d"))->first();
}
