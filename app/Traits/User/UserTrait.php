<?php

namespace App\Traits\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait UserTrait
{
    public static $updateAttr = ['id', 'name', 'email', 'phone', 'phone_verified_at', 'avatar'];

    public function getUserUpdatableData()
    {
        return manipulate_sig_data(Auth::user(), self::$updateAttr);
    }

    public function storeAvatar($file)
    {
        $isStore = $file->store('avatar');

        if ($isStore) {
            return $isStore;
        }

        return false;
    }

    public function getAvatarPath()
    {
        return Auth::user()->avatar ?: true;
    }

    public function deleteAvatar()
    {
        return Storage::delete($this->getAvatarPath());
    }

    public function updateUserData($data)
    {
        return Auth::user()->update($data);
    }

    public function error($error)
    {
        return redirect()
            ->back()
            ->withErrors($error);
    }
}
