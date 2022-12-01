<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use App\Models\Content\InformationType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view("pages.dashboard.index", [
            'drawers' => array_map(function ($item) {
                return [
                    'id'                => myEncrypt($item->id),
                    'name'              => $item->name,
                    'content_type'      => $item->content_type,
                    'password_required' => $item->is_password_required,
                    'date'              => Carbon::parse($item->created_at)->format('M d, Y, h:m A'),
                ];
            }, Content::where('content_type', 'drawer')->get()->all())
        ]);
    }
}
