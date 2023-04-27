<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantChangeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password'      => ['required', 'string', 'min:6'],
            'password'              => ['required', 'string', 'min:6', 'confirmed', 'different:current_password'],
            'password_confirmation' => ['required', 'string', 'min:6'],
        ];
    }
}
