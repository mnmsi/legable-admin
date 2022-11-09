<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\User\CardTrait;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    use CardTrait;

    public function index()
    {
        return view("pages.billing.index", [
            'cards' => $this->cardList()
        ]);
    }
}
