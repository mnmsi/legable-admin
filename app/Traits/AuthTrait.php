<?php

namespace App\Traits;

use App\Models\User\UserLoggedDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

trait AuthTrait
{
    public function storeDevice(Request $request, $user)
    {
        $deviceStore = UserLoggedDevice::updateOrCreate([
            'ip_address' => $request->ip(),
        ], [
            'user_id'     => $user->id,
            'ip_address'  => $request->ip(),
            'device_name' => $this->getPlatform(),
            'browser'     => $this->getBrowser(),
            'location'    => $this->getLocation($request),
            'logged_at'   => now(),
            'is_online'   => 1
        ]);

        if (!$deviceStore) {
            abort(404);
        }
    }

    public function getPlatform()
    {
        return (new Agent())->platform();
    }

    public function getBrowser()
    {
        return (new Agent())->browser();
    }

    public function getLocation(Request $request)
    {
        if (App::environment('local')) {
            $ip = "220.158.204.250";
        } else {
            $ip = $request->ip();
        }

        $location = Location::get($ip);

        return $this->getCountryAndCity($location);
    }

    public function getCountry($location)
    {
        return !is_null($location->countryName)
            ? $location->countryName
            : $location->countryCode;
    }

    public function getCity($location)
    {
        return !is_null($location->cityName)
            ? $location->cityName
            : $location->regionName;
    }

    public function getCountryAndCity($location)
    {
        return $this->getCity($location) . ", " . $this->getCountry($location);
    }
}
