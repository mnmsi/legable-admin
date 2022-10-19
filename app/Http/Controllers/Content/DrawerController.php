<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\DrawerRequest;
use App\Http\Resources\Content\DrawerResource;
use App\Models\Content\Content;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class DrawerController extends Controller
{
    public function index()
    {
        return view("pages.secretDrawer.index", [
            'drawers' => DrawerResource::collection(Content::where('content_type', 'drawer')->get())
        ]);
    }

    public function add()
    {
        return view("pages.secretDrawer.add");
    }

    public function store(DrawerRequest $request)
    {
        $content = Content::create($request->all());

        if (!$content) {
            abort(404);
        }

        return redirect()->route('drawer.index');
    }
}
