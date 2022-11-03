<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UserTrait;

    public function edit()
    {
        return view('pages.account.edit', [
            'user' => $this->getUserUpdatableData()
        ]);
    }

    public function update(UserUpdateRequest $request)
    {
        $reqData = $request->only('name', 'avatar');

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
