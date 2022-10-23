<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("pages.dashboard.index", [
            'drawers' => manipulate_data(Content::where('content_type', 'drawer')->get(), ['id', 'name', 'is_password_required', 'is_able_use_master_key']),
        ]);
    }
}
