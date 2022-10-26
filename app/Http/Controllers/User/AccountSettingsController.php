<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    public function accountSettings()
    {
        return view("pages.account.index", [
            'user' => manipulate_sig_data(Auth::user(), ['id', 'name', 'email', 'phone'])
        ]);
    }
}
