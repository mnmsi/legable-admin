<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\SecurityRequest;
use App\Models\Content\Content;
use App\Traits\Content\DrawerTrait;
use App\Traits\Content\SecurityTrait;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    use SecurityTrait, DrawerTrait;

    public function settings()
    {
        return view("pages.security.index", [
            'is_active_master_key' => Auth::user()->is_active_master_key
        ]);
    }

    public function check(SecurityRequest $request)
    {
        $drawer = Content::find($request->drawer_id);

        if (!$drawer) {
            abort(404);
        }

        if ($this->checkSecurity($drawer, $request->security_key)) {
            if ($drawer->content_type === 'file') {
                return response()->json([
                    'content_type' => $drawer->content_type,
                    'data'         => get_file($drawer->password, $drawer->file_url),
                ]);
            } else {
                return $this->returnItemView($drawer);
            }
        }

        return response()->json([
            'message' => "Invalid security key!!"
        ], 401);
    }
}
