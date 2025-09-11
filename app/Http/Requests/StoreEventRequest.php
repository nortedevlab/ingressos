<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de evento
 */
class StoreEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // aqui futuramente podemos usar policies
    }

    public function rules(): array
    {
        return [
            'company_id'  => 'required|exists:companies,id',
            'title'       => 'required|string|max:255',
            'type'        => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
            'location'    => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('validation.required', ['attribute' => __('events.name')]),
        ];
    }
}
