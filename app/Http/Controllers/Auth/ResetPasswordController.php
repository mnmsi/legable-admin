<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Models\User\User;
use App\Providers\RouteServiceProvider;
use App\Traits\Auth\AuthTrait;
use DB;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;

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

    use AuthTrait, ResetsPasswords {
        reset as traitReset;
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $check_token = DB::table('password_resets')->where([
           'email'=>$request->email,
           'token'=>\Hash::make($request->token),
        ])->first();
//        dd($request->email,\Hash::make($request->token));
//        dd($check_token);
        if($check_token){
            return redirect()->back()->with("error","Something went wrong");
        }else{
            User::where("email",$request->email)->update([
               'password' => \Hash::make($request->password)
            ]);
            DB::table('password_resets')->where([
                'email'=>$request->email,
            ])->delete();
            return redirect()->route("login")->withSuccess("Password Updated");
        }
    }

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
