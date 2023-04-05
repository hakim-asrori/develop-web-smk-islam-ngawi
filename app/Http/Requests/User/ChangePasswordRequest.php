<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "current_password" => "required|min:8|max:255",
            "new_password" => "required|min:8|max:255|same:confirm_password",
            "confirm_password" => "required|min:8|max:255|same:new_password"
        ];
    }

    public function attributes()
    {
        return [
            "current_password" => "password yang digunakan",
            "new_password" => "password baru",
            "confirm_password" => "konfirmasi password",
        ];
    }
}
