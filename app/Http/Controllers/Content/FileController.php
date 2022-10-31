<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\FileRequest;
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
        return view("pages.allContent.upload", [
            'drawers' => manipulate_data(Content::where('content_type', 'drawer')->get()->all(), ['id', 'name'])
        ]);
    }

    public function store(FileRequest $request)
    {
        $content = Content::create($request->all());

        if (!$content) {
            abort(404);
        }

        return redirect()->route('content');
    }

    public function getFile($id)
    {
        $content = Content::find(myDecrypt($id));

        return get_file($content->password, $content->file_url);
    }
}
