<?php

namespace App\Http\Controllers\MyPlan;

use App\Http\Controllers\Controller;
use App\Traits\System\SubscriptionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPlanController extends Controller
{
    use SubscriptionTrait;

    public function myPlan()
    {
        return view("pages.plans.index", [
            'auto_renewal'  => Auth::user()->auto_renewal,
            'isSubscribed' => $this->checkPlan() ?: false,
            'isTrial'      => $this->checkTrial()
        ]);
    }

    public function autoRenewal()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => "Invalid user request"
            ], 404);
        }

        if ($user->auto_renewal) {
            $user->auto_renewal = 0;
            $status             = 'warning';
            $message            = "Auto renewal inactivated";
        } else {
            $user->auto_renewal = 1;
            $status             = 'success';
            $message            = "Auto renewal activated";
        }

        $user->save();

        return response()->json([
            'status'  => $status,
            'message' => $message
        ]);
    }
}
