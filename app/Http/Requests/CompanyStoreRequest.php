<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'business_name'    => ['required', 'string', 'max:255'],
            'ruc'              => ['required', 'numeric', 'digits:11', 'unique:companies'],
            'address'          => ['required', 'string', 'max:255'],
            'phone_or_mobile'  => ['required', 'numeric', 'digits:9'],
            'dni'              => ['required', 'numeric', 'digits:8', 'unique:users'],
            'name'             => ['required', 'string', 'max:255'],
            'paternal_surname' => ['required', 'string', 'max:255'],
            'maternal_surname' => ['required', 'string', 'max:255'],
            'birth_date'       => ['required', 'date', 'before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('d-m-Y')],
            'gender'           => ['required', 'in:F,M'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }
}
