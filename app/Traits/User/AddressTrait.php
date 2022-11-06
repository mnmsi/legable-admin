<?php

namespace App\Traits\User;

use App\Models\User\UserAddress;

trait AddressTrait
{
    public function storeAddress($req)
    {
        return UserAddress::create($req->all());
    }

    public function fillableAttr()
    {
        return (new UserAddress)->getAttributes();
    }
}
