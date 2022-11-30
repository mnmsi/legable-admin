<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Providers\RouteServiceProvider;
use App\Traits\Auth\AuthTrait;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords, AuthTrait;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function passwordReset(ResetPasswordRequest $request)
    {
        if (!$this->userPassCheck($request->old_password)) {
            return redirect()
                ->back()
                ->withErrors(['old_password' => "Invalid old password!"])
                ->withInput();
        }

        $user = Auth::user()->update([
            'password' => $request->new_password
        ]);

        if (!$user) {
            abort(404);
        } else {
            return redirect()->back()
                             ->with("password_changed", "Password has been changed!");
        }
    }
}
