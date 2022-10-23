<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function settings()
    {
        return view("pages.security.index");
    }

    public function check()
    {

    }
}
