<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\System\SystemTrait;
use App\Traits\User\AddressTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    use AddressTrait;

    public function accountSettings()
    {
        return view("pages.account.index", [
            'user'         => manipulate_sig_data(Auth::user(), ['id', 'name', 'email', 'phone']),
            'addresses'    => $this->addressList(),
            'edit_address' => route('user.address.edit', $this->activeAddressEncId()),
            'email_verification_status' => is_null(Auth::user()->email_verified_at) ? 'unverified' : 'verified',
            'phone_verification_status' => is_null(Auth::user()->phone_verified_at) ? 'unverified' : 'verified'
        ]);
    }
}
