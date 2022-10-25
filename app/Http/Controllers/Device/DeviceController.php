<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\User\UserLoggedDevice;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function devices()
    {
        return view("pages.device.index", [
            'devices' => manipulate_data(UserLoggedDevice::get(), ['id', 'device_name', 'location', 'is_online', 'logged_at' => ['date', 'logged_at', 'M d, Y']])
        ]);
    }

    public function remove($id)
    {

    }
}
