<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|unique:App\Models\User\User,email',
            'phone'    => 'required|string|unique:App\Models\User\User,phone',
            'password' => 'required|string',

            'address.country'          => 'required|integer|exists:App\Models\System\Country,id',
            'address.city'             => 'required|string|max:255',
            'address.region'           => 'required|string|max:255',
            'address.zip'              => 'required|integer',
            'address.address_line_one' => 'required|string|max:255',
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'password' => Hash::make($this->password)
        ]);
    }
}
