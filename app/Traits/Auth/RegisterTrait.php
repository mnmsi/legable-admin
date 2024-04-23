<?php

namespace App\Traits\Auth;

use App\Models\User\User;

trait RegisterTrait
{
    public function createUser($data)
    {
        return User::create($data);
    }
}
