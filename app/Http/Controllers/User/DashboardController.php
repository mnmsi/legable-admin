<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content\Content;
use App\Models\Content\InformationType;
use App\Traits\Content\ContentTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    use ContentTrait;

    public function index()
    {
        return view("pages.dashboard.index", [
            'drawers'          => $this->getDrawers(),
            'boxes'            => $this->getBoxes(),
            'informationTypes' => InformationType::get(),
        ]);
    }
}
