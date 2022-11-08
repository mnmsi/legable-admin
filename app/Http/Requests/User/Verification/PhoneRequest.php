<?php

namespace App\Http\Requests\User\Verification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PhoneRequest extends FormRequest
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
            'otp' => 'required|integer|min_digits:6|max_digits:6|exists:App\Models\System\UserVerification,otp,gateway,phone,user_id,' . Auth::id()
        ];
    }
}
