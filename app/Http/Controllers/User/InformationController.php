<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\InformationRequest;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function addInfo()
    {
        return view("pages.information.add");
    }

    public function store(InformationRequest $request)
    {
//        dd($request->all());
    }
}
