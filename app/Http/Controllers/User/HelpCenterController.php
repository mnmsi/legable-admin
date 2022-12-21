<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Notifications\HelpCenterMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class HelpCenterController extends Controller
{
    public function helpCenter(Request $request)
    {
        Notification::route('mail', getenv("MAIL_FROM_ADDRESS"))
                    ->notify(new HelpCenterMailNotification($request->all()));

        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }
}
