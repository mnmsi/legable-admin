<?php

namespace App\Http\Requests\User;

use App\Traits\Auth\AuthTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordRequest extends FormRequest
{
    use AuthTrait;

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
            'old_password' => 'required|string|max:255',
            'new_password' => 'required|string|max:255',
        ];
    }

    protected function passedValidation()
    {
        if (!$this->userPassCheck($this->old_password)) {
            return redirect()
                ->back()
                ->withErrors(['old_password' => "Invalid old password!"])
                ->withInput();
        }

        $this->merge([
            'new_password' => Hash::make($this->new_password)
        ]);
    }
}
