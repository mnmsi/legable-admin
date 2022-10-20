<?php

namespace App\Http\Requests\Content;

use App\Models\Content\Content;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        if (!empty($this->drawer)) {
            $this->merge([
                'drawer' => myDecrypt($this->drawer)
            ]);
        }

        return [
            'file'              => 'required|file',
            'drawer'            => 'nullable|string|exists:App\Models\Content\Content,id',
            'password_required' => 'required|string|in:on,off',
            'use_master_key'    => 'required|string|in:on,off',
        ];
    }

    protected function passedValidation()
    {
        $drawer = Content::where('content_type', 'drawer')->find($this->drawer);

        if (!$drawer) {
            abort(404);
        }

        if (!$this->hasFile('file') && !$this->file('file')->isValid()) {
            abort(404);
        }

        $this->merge([
            'content_type'           => 'file',
            'parent_id'              => myDecrypt($drawer->id),
            'name'                   => $this->file->getClientOriginalName(),
            'file_url'               => file_upload($this->file),
            'password'               => $drawer->password,
            'is_password_required'   => $this->password_required,
            'is_able_use_master_key' => $this->use_master_key,
        ]);
    }
}
