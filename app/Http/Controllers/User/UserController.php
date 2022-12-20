<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Traits\User\PhoneVerificationTrait;
use App\Traits\User\UserTrait;

class UserController extends Controller
{
    use UserTrait, PhoneVerificationTrait;

    public function edit()
    {
        return view('pages.account.edit', [
            'user' => $this->getUserUpdatableData()
        ]);
    }

    public function update(UserUpdateRequest $request)
    {
        try {
            if (!is_null($this->phoneLookUp($request->phone)['error_code'])) {
                return $this->returnExceptionPhoneValidation(['phone' => 'Invalid phone number']);
            }
        }
        catch (\Exception $e) {
            return $this->returnExceptionPhoneValidation(['phone' => 'Invalid phone number']);
        }

        $reqData = $request->only('name', 'phone', 'avatar');

        if ($request->has('avatar')) {
            $this->deleteAvatar();
            $path = $this->storeAvatar($request->file('avatar'));

            if ($path === false) {
                return $this->error("Unable to upload avatar!");
            }

            $reqData['avatar'] = $path;
        }

        if ($this->updateUserData($reqData)) {
            return redirect()->route('acc.setting');
        }

        return $this->error("Unable to update data!");
    }
}
