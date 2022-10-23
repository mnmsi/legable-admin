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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (empty($this->file_password_required)) {
            $this->merge([
                'file_password_required' => 'off'
            ]);
        }

        return [
            'file'                   => 'required|file',
            'drawer'                 => 'required_if:security_key,null',
            'security_key'           => 'required_if:drawer,""|max:255',
            'file_password_required' => 'required|string|in:on,off',
            'use_master_key'         => 'required|string|in:on,off',
        ];
    }

    protected function passedValidation()
    {
        if (!empty($this->drawer)) {
            $drawer    = Content::where('content_type', 'drawer')->find(myDecrypt($this->drawer));
            $parent_id = myDecrypt($drawer->id);
            $password  = $drawer->password;
        } else {
            $parent_id = null;
            $password  = $this->security_key;
        }

        if (!$this->hasFile('file') && !$this->file('file')->isValid()) {
            abort(404);
        }

        $this->merge([
            'content_type'           => 'file',
            'parent_id'              => $parent_id,
            'name'                   => $this->file->getClientOriginalName(),
            'file_url'               => file_upload($this->file),
            'password'               => Hash::make($password),
            'is_password_required'   => $this->file_password_required,
            'is_able_use_master_key' => $this->use_master_key,
        ]);
    }
}
