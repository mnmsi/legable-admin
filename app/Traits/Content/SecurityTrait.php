<?php

namespace App\Traits\Content;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait SecurityTrait
{
    public function checkSecurity($drawer, $password)
    {
        if ($this->checkHash($drawer->password, $password)) {
            return true;
        }

        if ($drawer->is_able_use_master_key && Auth::user()->is_active_master_key && !empty(Auth::user()->master_key)) {
            if ($this->checkHash(Auth::user()->master_key, $password)) {
                return true;
            }
        }

        return false;
    }

    public function checkHash($hash, $securityKey)
    {
        return Hash::check($securityKey, $hash);
    }
}
