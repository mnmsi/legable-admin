<?php

namespace App\Traits\System;

use App\Models\System\UserVerification;

trait VerificationTrait
{
    public function create($data)
    {
        return UserVerification::create($data);
    }

    public function createToken($userId, $gateway)
    {
        return $this->create($this->makeData($userId, $gateway));
    }

    public function makeData($userId, $gateway)
    {
        return [
            'user_id'    => $userId,
            'gateway'    => $gateway,
            'otp'        => $this->generateToken(),
            'expires_at' => now()->addMinutes(5),
        ];
    }

    public function generateToken()
    {
        return rand(000000, 999999);
    }
}
