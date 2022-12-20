<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\AjaxFileRequest;
use App\Http\Requests\Content\FileRequest;
use App\Models\Content\Content;
use App\Traits\Content\DrawerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FileController extends Controller
{
    use DrawerTrait;

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
            'drawers' => manipulate_data(Content::where('content_type', 'drawer')->get()->all(), ['id', 'name']),
            'boxes'   => manipulate_data(Content::where('content_type', 'box')->get()->all(), ['id', 'name'])
        ]);
    }

    public function store(FileRequest $request)
    {
        $content = Content::create($request->all());

        if (!$content) {
            abort(404);
        }

        return redirect()->route('content')->withSuccess('Success!');
    }

    public function storeAjax(AjaxFileRequest $request)
    {
        $content = Content::create($request->all());

        if (!$content) {
            return response()->json([
                'status'      => false,
                'msg'         => ["Unable to upload file. Please try again!!"],
            ]);
        }

        $drawer = Content::find(myDecrypt($request->content_id));

        return response()->json([
            'status'      => true,
            'msg'         => ["Successfully upload content!!"],
            'drawer_name' => $drawer->name,
            'data'        => $this->returnItemView($drawer, $request->content_id)->render()
        ]);
    }

    public function getFile($id)
    {
        $content = Content::find(myDecrypt($id));

        if ($content->is_password_required) {
            abort(404);
        }

        return get_file_url($content->password, $content->file_url);
    }
}
