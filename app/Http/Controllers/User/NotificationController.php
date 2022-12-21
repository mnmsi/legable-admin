<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\User\NotificationTrait;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use NotificationTrait;

    public function notifications()
    {
        return $this->getNotification();
    }
}
