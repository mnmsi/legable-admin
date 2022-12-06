<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (!isset($this->password_required)) {
            $this->merge([
                'password_required' => 0
            ]);
        }

        return [
            'drawer_name'       => 'required|unique:App\Models\Content\Content,name,user_id,' . Auth::id() . '|string|max:255',
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
            'is_able_use_master_key' => 1,
        ]);
    }
}
