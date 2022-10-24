<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\DrawerRequest;
use App\Models\Content\Content;
use App\Traits\DrawerTrait;
use App\Traits\SecurityTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function GuzzleHttp\Promise\all;

class DrawerController extends Controller
{
    use SecurityTrait, DrawerTrait;

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

    public function create(DrawerRequest $request)
    {
        $content = Content::create($request->all());

        if (!$content) {
            abort(404);
        }

        return redirect()->route('drawer.index');
    }

    public function items($data)
    {
        $data = json_decode(myDecrypt($data));
        if (!$data) {
            abort(404);
        }

        $drawer = Content::find($data->drawer_id);

        if (!$drawer) {
            abort(404);
        }

        if (!$this->checkSecurity($drawer, $data->security_key)) {
            abort(404);
        }

        return $this->returnItemView($drawer);
    }
}
