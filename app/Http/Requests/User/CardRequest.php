<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationMonth;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardNumber;

class CardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $this->merge([
            'number' => str_replace(" ", "", $this->number)
        ]);

        return [
            'name'      => 'required|string|max:255',
            'number'    => 'required|integer',
            'exp_month' => 'required|integer|between:1,12',
            'exp_year'  => 'required|integer|digits:4|min:' . (date('Y')),
            'cvc'       => 'required|integer|digits_between:3,4',
        ];
    }
}
