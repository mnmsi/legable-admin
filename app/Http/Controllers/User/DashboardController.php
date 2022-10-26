<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use App\Models\Content\InformationType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("pages.dashboard.index", [
            'drawers' => manipulate_data(Content::where('content_type', 'drawer')->orderBy('uses_at', 'desc')->get(),
                ['id', 'name', 'date'=> ['date', 'created_at', 'M d, Y, h:m A'], 'is_password_required', 'is_able_use_master_key']),
            'information' => manipulate_data(InformationType::all(), ['id', 'name'])
        ]);
    }
}
