<?php

namespace App\Traits\Auth;

use App\Models\User\UserLoggedDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

trait AuthTrait
{
    public function storeDevice(Request $request, $user)
    {
        $deviceStore = UserLoggedDevice::updateOrCreate([
            'ip_address'  => $request->ip(),
            'device_name' => $this->getDevice(),
            'browser'     => $this->getBrowser(),
        ], [
            'user_id'     => $user->id,
            'ip_address'  => $request->ip(),
            'device_name' => $this->getDevice(),
            'browser'     => $this->getBrowser(),
            'location'    => $this->getLocation($request),
            'logged_at'   => now(),
            'is_online'   => 1,
            'session_id'  => $request->getSession()->getId()
        ]);

        if (!$deviceStore) {
            abort(404);
        }
    }

    public function logoutDevice(Request $request)
    {
        $logoutDevice = UserLoggedDevice::where('ip_address', $request->ip())
                                        ->update([
                                            'is_online' => 0
                                        ]);

        if (!$logoutDevice) {
            abort(404);
        }
    }

    public function getDevice()
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

    public function invalidateSession($sessionId)
    {
        return Storage::disk('session')->delete($sessionId);
    }

    public function userPassCheck($password)
    {
        return Hash::check($password, Auth::user()->password);
    }
}
