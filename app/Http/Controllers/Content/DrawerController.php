<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\DrawerRequest;
use App\Models\Content\Content;
use App\Traits\Content\ContentTrait;
use App\Traits\Content\DrawerTrait;
use App\Traits\Content\SecurityTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DrawerController extends Controller
{
    use SecurityTrait, DrawerTrait, ContentTrait;

    public function index()
    {
        return view("pages.secretDrawer.index", [
            'drawers' => $this->getDrawers(),
            'boxes'   => $this->getBoxes()
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
