<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementStoreRequest extends FormRequest
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
            'start_date' => ['nullable', 'date', 'after:yesterday'],
            'end_date'   => ['nullable', 'date', 'after:start_date'],
            'position'   => ['nullable', 'string', 'max:255'],
            'bases'      => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
            'annexes'    => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'start_date.after' => 'El campo Fecha de Inicio debe ser una fecha igual o posterior a hoy.',
            'end_date.after'   => 'El campo Fecha de Finalización debe ser una fecha posterior a la Fecha de Inicio.',
        ];
    }
}
