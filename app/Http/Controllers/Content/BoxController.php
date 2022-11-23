<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\BoxRequest;
use App\Models\Content\Content;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function create(BoxRequest $request)
    {
        $content = Content::create($request->all());
        if (!$content) {
            abort(404);
        }

        return redirect()->back()->withSuccess("Success!");
    }
}
