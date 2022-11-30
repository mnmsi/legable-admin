<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\System\SubscriptionTrait;
use App\Traits\User\CardTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    use CardTrait, SubscriptionTrait;

    public function index()
    {
        return view("pages.billing.index", [
            'cards'    => $this->cardList(),
            'billings' => $this->billingHistory()
        ]);
    }

    public function updatePlan()
    {
        if (!is_null($this->checkPlan()) || $this->checkTrial()) {
            return redirect()->route('dashboard');
        }

        return view('pages.billing.update_plan');
    }

    public function downloadInvoice($id)
    {
        $data = $this->getSubscriptionDetails($id);
        if (!$data) {
            abort(404);
        }

        return Pdf::loadView('pages.invoice.index', ['data' => $data])->download();
    }
}
