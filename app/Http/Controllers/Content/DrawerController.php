<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\DrawerRequest;
use App\Models\Content\Content;
use App\Traits\Content\DrawerTrait;
use App\Traits\Content\SecurityTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DrawerController extends Controller
{
    use SecurityTrait, DrawerTrait;

    public function index()
    {
        return view("pages.secretDrawer.index", [
            'drawers' => array_map(function ($item) {
                return [
                    'id'                => myEncrypt($item->id),
                    'name'              => $item->name,
                    'content_type'      => $item->content_type,
                    'password_required' => $item->is_password_required,
                    'date'              => Carbon::parse($item->created_at)->format('M d, Y, h:m A'),
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

        return redirect()->route('drawer.index')->withSuccess('Success!');
    }

    public function items($id)
    {
        $drawer = Content::find(myDecrypt($id));

        if (!$drawer || $drawer->is_password_required) {
            abort(404);
        }

        return $this->returnItemView($drawer, $id);
    }

    public function orderDrawer(Request $request)
    {
        foreach ($request->order as $key => $order) {
            Content::find(myDecrypt($order))->update([
                'order' => $key
            ]);
        }

        return true;
    }
}
