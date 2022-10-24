<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SecurityRequest extends FormRequest
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
        if (!empty($this->drawer_key)) {
            $this->merge([
                'drawer_id' => myDecrypt($this->drawer_key)
            ]);
        }

        return [
            'security_key' => 'required|string|max:255',
            'drawer_id'    => 'required|integer|exists:App\Models\Content\Content,id',
        ];
    }
}
