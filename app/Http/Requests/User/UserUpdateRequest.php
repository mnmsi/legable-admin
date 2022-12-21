<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
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
        if($this->phone == Auth::user()->phone) {
           return [
               'name' => 'required|string|max:255',
           ];
        }else{
            return [
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255|unique:App\Models\User\User,phone',
            ];
        }

    }
}
