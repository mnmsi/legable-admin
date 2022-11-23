<?php

namespace App\Http\Controllers\Device;

use App\Http\Controllers\Controller;
use App\Models\User\UserLoggedDevice;
use App\Traits\Auth\AuthTrait;
use Carbon\Carbon;

class DeviceController extends Controller
{
    use AuthTrait;

    public function devices()
    {
        $data = collect(array_map(function ($item) {
            return [
                'id'          => myEncrypt($item['id']),
                'device_name' => $item['device_name'],
                'location'    => $item['location'],
                'is_online'   => $item['is_online'],
                'logged_at'   => Carbon::parse($item['logged_at'])->format('M d, Y'),
                'this_device' => ($item['ip_address'] == request()->ip()
                    && $item['device_name'] == $this->getDevice()
                    && $item['browser'] == $this->getBrowser())
                    ? 1 : 0
            ];
        }, UserLoggedDevice::get()->all()))
            ->sortByDesc('this_device');

        return view("pages.device.index", [
            'devices' => $data
        ]);
    }

    public function remove($id)
    {
        $device = UserLoggedDevice::find(myDecrypt($id));

        if (!$device) {
            abort(404);
        }

        if (!$this->invalidateSession($device->session_id)) {
            abort(404);
        }

        $device->delete();

        return redirect()->back()->withSuccess('Success!');
    }
}
