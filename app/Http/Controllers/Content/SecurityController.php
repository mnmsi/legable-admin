<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\SecurityRequest;
use App\Models\Content\Content;
use App\Traits\DrawerTrait;
use App\Traits\SecurityTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    use SecurityTrait, DrawerTrait;

    public function settings()
    {
        return view("pages.security.index");
    }

    public function check(SecurityRequest $request)
    {
        $drawer = Content::find($request->drawer_id);

        if (!$drawer) {
            abort(404);
        }

        if ($this->checkSecurity($drawer, $request->security_key)) {
            return $this->returnItemView($drawer);
        }

        return response()->json([
            'message' => "Invalid security key!!"
        ], 401);
    }
}
