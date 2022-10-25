<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\User\UserLoggedDevice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function devices()
    {
        return view("pages.device.index", [
            'devices' => array_map(function ($item) {
                return [
                    'id'          => myEncrypt($item['id']),
                    'device_name' => $item['device_name'],
                    'location'    => $item['location'],
                    'is_online'   => $item['is_online'],
                    'logged_at'   => Carbon::parse($item['logged_at'])->format('M d, Y'),
                    'this_device' => $item['ip_address'] == request()->ip() ? true : false
                ];
            }, UserLoggedDevice::get()->all())
        ]);
    }

    public function remove($id)
    {

    }
}
