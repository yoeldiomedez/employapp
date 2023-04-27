<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUpdateRequest extends FormRequest
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
            'affidavit_file' => ['required', 'file', 'mimes:pdf', 'max:1536'],
            'dni_file'       => ['required', 'file', 'mimes:pdf', 'max:1536'],
            'vacancy_file'   => ['required', 'file', 'mimes:pdf', 'max:1536'],
            'aditional_file' => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
        ];
    }
}
