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
            'password' => 'required|string|min:8',

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

    public function messages()
    {
        return [
            'address.address_line_one.required'=>'The address field is required',
            'address.address_line_one.string'=>'The address field is not valid format',
            'address.address_line_one.max'=>'The address field is less than or equal 255',

            'address.country.required'=>'The country field is required',
            'address.country.integer'=>'The country field is not valid format',

            'address.city.required'=>'The city field is required',
            'address.city.integer'=>'The city field is not valid format',
            'address.city.max'=>'The city field is less than or equal 255',

            'address.region.required'=>'The region field is required',
            'address.region.integer'=>'The region field is not valid format',
            'address.region.max'=>'The region field is less than or equal 255',

            'address.zip.required'=>'The zip field is required',
            'address.zip.integer'=>'The zip field is not valid format',
            'address.zip.max'=>'The zip field is less than or equal 15',



        ];
    }

}
