<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de evento
 */
class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'type'        => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after:start_date',
            'location'    => 'required|string|max:255',
        ];
    }
}
