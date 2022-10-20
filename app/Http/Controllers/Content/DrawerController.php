<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\DrawerRequest;
use App\Models\Content\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function GuzzleHttp\Promise\all;

class DrawerController extends Controller
{
    public function index()
    {
        return view("pages.secretDrawer.index", [
            'drawers' => array_map(function ($item) {
                return [
                    'id'   => $item->id,
                    'name' => $item->name,
                    'date' => Carbon::parse($item->created_at)->format('M d, Y, h:m A'),
                ];
            }, Content::where('content_type', 'drawer')->get()->all())
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
