<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CardRequest;
use App\Traits\User\CardTrait;
use Illuminate\Http\Request;

class CardController extends Controller
{
    use CardTrait;

    public function addCard()
    {
        return view("pages.billing.add");
    }

    public function storeCard(CardRequest $request)
    {
        if (!$card = $this->validateCard($request->all())) {
            abort(404);
        }

        $request['brand'] = $card->card->brand;

        if (!$this->create($request->all())) {
            abort(404);
        }

        return redirect()->route('billing.index');
    }
}
