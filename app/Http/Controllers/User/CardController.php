<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CardRequest;
use App\Traits\System\StripePaymentTrait;
use App\Traits\User\CardTrait;
use Illuminate\Http\Request;

class CardController extends Controller
{
    use CardTrait, StripePaymentTrait;

    public function addCard()
    {
        return view("pages.billing.add");
    }

    public function storeCard(CardRequest $request)
    {
        if (!$card = $this->validateCard($request->all())) {
            abort(404);
        }

        $request['brand'] = strtolower($card->card->brand);
        if (!$this->create($request->all())) {
            abort(404);
        }

        return redirect()->route('billing.index')->withSuccess('Success!');
    }

    public function deleteCard($id)
    {
        if (!$card = $this->getCard($id)) {
            abort(404);
        }

        if ($card->is_active) {
            if ($firstCard = $this->getFirstCard()) {
                $firstCard->update([
                    'is_active' => 1
                ]);
            }
        }

        $card->delete();
        return redirect()->back()->withSuccess('Success!');
    }

    public function activeCard($id)
    {
        if (!$card = $this->getCard($id)) {
            abort(404);
        }

        if ($activeCard = $this->getActiveCard()) {
            $activeCard->update([
                'is_active' => 0
            ]);
        }

        $card->update([
            'is_active' => 1
        ]);

        return redirect()->back()->withSuccess('Success!');
    }
}
