<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return view("pages.allContent.index", [
            'drawers' => manipulate_data(Content::where('content_type', 'drawer')->get(), ['id' => 'encrypt', 'name', 'is_password_required'])
        ]);
    }
}
