<?php

namespace App\Traits\User;

use Illuminate\Support\Facades\Http;

trait NotificationTrait
{
    public function getNotification()
    {
        try {
            $http = Http::get("http://34.207.161.107/wp-json/wl/v1/notifications")->object();

            if ($http->status === true) {
                return $http;
            }

            return (object)[
                'status' => false,
                'data'   => []
            ];
        }
        catch (\Exception $exception) {
            return (object)[
                'status' => false,
                'data'   => []
            ];
        }
    }
}
