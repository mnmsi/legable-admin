<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DrawerRequest extends FormRequest
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
            'drawer_name'       => 'required|string|max:255',
            'drawer_password'   => 'required|string|max:255',
            'password_required' => 'required|string|in:on,off',
            'master_key'        => 'nullable|string|in:on,off', //need update
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'content_type'           => 'drawer',
            'name'                   => $this->drawer_name,
            'password'               => $this->drawer_password,
            'is_password_required'   => $this->password_required,
            'is_able_use_master_key' => 1,
        ]);
    }
}
