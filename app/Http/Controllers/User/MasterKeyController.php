<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterKeyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterKeyController extends Controller
{
    public function setMasterKey(MasterKeyRequest $request)
    {
        $user = Auth::user()->update($request->only('master_key'));

        if (!$user) {
            abort(404);
        }

        return redirect()
            ->back()
            ->with("generate_master_key", "Successfully set master key.");
    }

    public function changeStatus()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => "Invalid user request"
            ], 404);
        }

        if (empty($user->master_key)) {
            return response()->json([
                'message' => "Master key hasn't set"
            ], 404);
        }

        if ($user->is_active_master_key) {
            $user->is_active_master_key = 0;
            $status                     = 'warning';
            $message                    = "Master key inactivated";
        } else {
            $user->is_active_master_key = 1;
            $status                     = 'success';
            $message                    = "Master key activated";
        }

        $user->save();

        return response()->json([
            'status'  => $status,
            'message' => $message
        ]);
    }
}
