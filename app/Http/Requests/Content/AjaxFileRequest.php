<?php

namespace App\Http\Requests\Content;

use App\Models\Content\Content;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AjaxFileRequest extends FormRequest
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

        if ($this->content_type == 'box') {
            $this->merge([
                'drawer' => $this->box
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
            'file'                   => 'required|mimes:jpeg,bmp,png,gif,svg,pdf,docx,pptx,xls,csv|max:100000',
            'drawer'                 => 'required_if:security_key,null',
            'security_key'           => 'required_if:drawer,""|max:255',
            'file_password_required' => 'required|integer|in:0,1',
            'use_master_key'         => 'required|integer|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'drawer.required_if'       => 'The ' . ($this->content_type ?? 'drawer') . ' field is required.',
            'security_key.required_if' => 'The security key field is required.',
        ];
    }

    protected function passedValidation()
    {
        if (!empty($this->drawer)) {
            $drawer = Content::where('content_type', $this->content_type)->find(myDecrypt($this->drawer));
            if (!$drawer) {
                $this->errorRes("Something went wrong. Please try again later.");
            }

            $parent_id = $drawer->id;
            $password  = !empty($this->file_password_required) ? Hash::make($this->security_key) : $drawer->password;

        } else {
            $parent_id = null;
            $password  = Hash::make($this->security_key);
        }

        if (!$this->hasFile('file') && !$this->file('file')->isValid()) {
            $this->errorRes("Something went wrong. Please try again later.");
        }

        $this->merge([
            'content_type'           => 'file',
            'parent_id'              => $parent_id,
            'name'                   => $this->file->getClientOriginalName(),
            'file_url'               => file_upload($password, $this->file, ($drawer->id . '_' . $drawer->name) ?? microtime()),
            'password'               => $password,
            'is_password_required'   => ($this->file_password_required || $this->use_master_key) ? 1 : 0,
            'is_able_use_master_key' => $this->use_master_key,
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'errors' => view("components.utils.top_alert", ['errors' => $validator->errors()])->render(),
            ], 422)
        );
    }

    public function errorRes($msg)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'errors' => $msg,
            ])
        );
    }
}
