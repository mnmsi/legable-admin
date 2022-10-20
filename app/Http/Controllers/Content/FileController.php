<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FileController extends Controller
{
    public function index()
    {
        $drawers = array_map(function ($item) {
            return [
                'id'   => $item->id,
                'name' => $item->name,
            ];
        }, Content::where('content_type', 'drawer')->get()->all());

        return view("pages.allContent.index", compact('drawers'));
    }

    public function upload()
    {
        $drawers = array_map(function ($item) {
            return [
                'id'   => $item->id,
                'name' => $item->name,
            ];
        }, Content::where('content_type', 'drawer')->get()->all());

        return view("pages.allContent.upload", compact('drawers'));
    }
}
