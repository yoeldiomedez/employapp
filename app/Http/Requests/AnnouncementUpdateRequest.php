<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementUpdateRequest extends FormRequest
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
            'start_date'      => ['required', 'date',],
            'end_date'        => ['required', 'date', 'after:start_date'],
            'position'        => ['required', 'string', 'max:255'],
            'bases'           => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
            'annexes'         => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
            'partial_results' => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
            'final_results'   => ['nullable', 'file', 'mimes:pdf', 'max:1536'],
        ];
    }
}
