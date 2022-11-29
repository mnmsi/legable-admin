<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Traits\Content\ContentTrait;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    use ContentTrait;

    public function index(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = collect(json_decode(str_replace("'", '"', $request->searchData), true));
        }
        return view("pages.allContent.index", [
            'drawers'  => $this->drawersWithDefaultAttr($data ?? null),
            'contents' => $this->filesWithDefaultAttr($data ?? null)
        ]);
    }
}
