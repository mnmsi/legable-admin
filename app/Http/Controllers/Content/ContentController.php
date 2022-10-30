<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use App\Traits\ContentTrait;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    use ContentTrait;

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = collect(json_decode(str_replace("'", '"', $request->searchData), true));

            return view("pages.allContent.index", [
                'drawers'  => manipulate_data($this->drawerFromData($data), self::$defaultAttr),
                'contents' => manipulate_data($this->filesFromData($data), self::$defaultAttr)
            ]);
        }

        return view("pages.allContent.index", [
            'drawers'  => manipulate_data($this->drawers(), self::$defaultAttr),
            'contents' => manipulate_data($this->files(), self::$defaultAttr)
        ]);
    }
}
