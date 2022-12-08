<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InformationRequest extends FormRequest
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
            'title'   => 'required|array',
            'title.*' => 'required|string|max:255',
            'data'    => 'required|array',
            'data.*'  => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.*.required' => 'This field is required',
            'data.*.required'  => 'This field is required',
        ];
    }

    protected function passedValidation()
    {
        $data = array();
        foreach ($this->title as $key => $title) {
            $data[] = [
                'title' => $title,
                'data'  => myEncrypt($this->data[$key]),
            ];
        }

        $this->merge(['data' => $data]);
    }
}
