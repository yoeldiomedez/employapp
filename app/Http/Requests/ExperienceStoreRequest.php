<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceStoreRequest extends FormRequest
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
            'company'     => ['required', 'string'],
            'position'    => ['required', 'string', 'max:60'],
            'start_date'  => ['required', 'date', 'before:tomorrow'],
            'end_date'    => ['required', 'date', 'after:start_date'],
            'description' => ['required', 'string'],
            'file'        => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
        ];
    }
}
