<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddressRequest extends FormRequest
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
        return [
            'address_line_one' => 'required|string|max:255',
            'address_line_two' => 'nullable|string|max:255',
            'country'          => 'required|integer|exists:App\Models\System\Country,id',
            'city'             => 'required|string|max:255',
            'region'           => 'required|string|max:255',
            'zip'              => 'required|integer',
        ];
    }
}
