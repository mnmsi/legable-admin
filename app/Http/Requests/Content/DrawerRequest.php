<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    protected function prepareForValidation()
    {
        if (!isset($this->password_required)) {
            $this->merge([
                'password_required' => 0
            ]);
        }

        if (!isset($this->master_key)) {
            $this->merge([
                'master_key' => 0
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'drawer_name'       => [
                'required',
                'string',
                'max:255',
                Rule::unique('contents', 'name')
                    ->where('user_id', Auth::id())
            ],
            'drawer_password'   => 'required|string|max:255',
            'password_required' => 'required|integer|in:0,1',
            'master_key'        => 'nullable|integer|in:0,1', //need update
        ];
    }

    protected function passedValidation()
    {
        $this->merge([
            'content_type'           => 'drawer',
            'name'                   => $this->drawer_name,
            'password'               => Hash::make($this->drawer_password),
            'is_password_required'   => $this->password_required,
            'is_able_use_master_key' => $this->master_key,
        ]);
    }
}
