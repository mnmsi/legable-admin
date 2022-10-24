<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait SecurityTrait
{
    public function checkSecurity($drawer, $password)
    {
        if ($this->checkHash($drawer->password, $password)) {
            return true;
        }

        if ($drawer->is_able_use_master_key) {
            if ($this->checkHash($drawer->password, $password)) {
                return true;
            }
        }

        return false;
    }

    public function checkHash($hash, $securityKey)
    {
        return Hash::check($securityKey, $hash);
    }

    public function returnItemView($items)
    {
        return view("components.contents.content", [
            'drawers'  => manipulate_data($items->drawerItems->where('content_type', 'box'), ['id', 'name', 'is_password_required', 'is_able_use_master_key']),
            'contents' => manipulate_data($items->drawerItems->where('content_type', 'file'), ['id', 'name', 'is_password_required', 'is_able_use_master_key'])
        ]);
    }
}
