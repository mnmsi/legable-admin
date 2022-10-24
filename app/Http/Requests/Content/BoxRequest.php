<?php

namespace App\Http\Requests\Content;

use App\Models\Content\Content;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BoxRequest extends FormRequest
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
        if (!empty($this->drawer)) {
            $this->merge([
                'drawer' => myDecrypt($this->drawer)
            ]);
        }

        if (!isset($this->password_required)) {
            $this->merge([
                'password_required' => 0
            ]);
        }

        return [
            'box_name'          => 'required|string|max:255',
            'drawer'            => 'required|string|exists:App\Models\Content\Content,id',
            'password_required' => 'required|integer|in:0,1',
            'use_master_key'    => 'required|integer|in:0,1',
        ];
    }

    protected function passedValidation()
    {
        $drawer = Content::where('content_type', 'drawer')->find($this->drawer);

        if (!$drawer) {
            abort(404);
        }

        $this->merge([
            'content_type'           => 'box',
            'parent_id'              => myDecrypt($drawer->id),
            'name'                   => $this->box_name,
            'password'               => $drawer->password,
            'is_password_required'   => $this->password_required,
            'is_able_use_master_key' => $this->use_master_key,
        ]);
    }
}
