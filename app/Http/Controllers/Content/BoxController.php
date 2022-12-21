<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\BoxRequest;
use App\Models\Content\Content;
use App\Traits\Content\DrawerTrait;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    use DrawerTrait;

    public function create(BoxRequest $request)
    {
        $content = Content::create($request->all());
        if (!$content) {
            abort(404);
        }

        $drawer = Content::find(myDecrypt($request->drawerContent));

        return response()->json([
            'status'      => true,
            'drawer_name' => $content->name,
            'msg'         => '<small class="text-small text-success ml-3">Successfully created!!</small>',
            'data'        => $this->returnItemView($drawer, $request->drawerContent)->render()
        ]);
    }
}
