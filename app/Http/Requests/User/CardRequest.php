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

    protected function prepareForValidation()
    {
        $this->merge([
            'number' => str_replace(" ", "", $this->number)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'number'    => 'required|numeric',
            'exp_month' => 'required|numeric|between:1,12' . (date('Y') == $this->exp_year ? '|min:' . date('m') : ''),
            'exp_year'  => 'required|numeric|digits:4|min:' . (date('Y')),
            'cvc'       => 'required|numeric|digits_between:3,4',
        ];
    }

    public function messages()
    {
        return [
            'exp_month.min' => 'The expiration month is invalid.',
            'exp_year.min'  => 'The expiration year is invalid.',
        ];
    }
}
