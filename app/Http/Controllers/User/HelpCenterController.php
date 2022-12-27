<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Notifications\HelpCenterMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class HelpCenterController extends Controller
{
    public function helpCenter(Request $request)
    {
        Notification::route('mail', getenv("MAIL_FROM_ADDRESS"))
                    ->notify(new HelpCenterMailNotification($request->all()));

        return redirect()->back()->with('success', 'Your message has been sent successfully');
    }

    public function helpCenterAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'The given data was invalid.',
                'errors'  => $validator->errors()->all(),
            ], 422);
        }

        try {
            Notification::route('mail', getenv("MAIL_FROM_ADDRESS"))
                        ->notify(new HelpCenterMailNotification($request->all()));
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Something went wrong.',
                'errors'  => $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully'
        ]);
    }
}
