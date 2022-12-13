<?php

namespace App\Http\Requests\Content;

use App\Models\Content\Content;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FileRequest extends FormRequest
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
        if (!isset($this->file_password_required)) {
            $this->merge([
                'file_password_required' => 0
            ]);
        }

        if (!isset($this->use_master_key)) {
            $this->merge([
                'use_master_key' => 0
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
            'file'                   => 'required|file|max:512000',
            'drawer'                 => 'required_if:security_key,null',
            'security_key'           => 'required_if:drawer,""|max:255',
            'file_password_required' => 'required|integer|in:0,1',
            'use_master_key'         => 'required|integer|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'drawer.required_if'       => 'The drawer field is required.',
            'security_key.required_if' => 'The security key field is required.',
        ];
    }

    protected function passedValidation()
    {
        if (!empty($this->drawer)) {
            $drawer = Content::where('content_type', 'drawer')->find(myDecrypt($this->drawer));
            if (!$drawer) {
                $drawer = Content::where('content_type', 'box')->find(myDecrypt($this->drawer));
            }

            $parent_id = $drawer->id;
            $password  = $drawer->password;

        } else {
            $parent_id = null;
            $password  = Hash::make($this->security_key);
        }

        if (!$this->hasFile('file') && !$this->file('file')->isValid()) {
            abort(404);
        }

        $this->merge([
            'content_type'           => 'file',
            'parent_id'              => $parent_id,
            'name'                   => $this->file->getClientOriginalName(),
            'file_url'               => file_upload($password, $this->file),
            'password'               => $password,
            'is_password_required'   => $this->use_master_key ? 1 : $this->file_password_required,
            'is_able_use_master_key' => $this->use_master_key,
        ]);
    }
}
