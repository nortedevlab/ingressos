<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de PDA
 */
class StorePdaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_id'   => 'required|exists:events,id',
            'gate_name'  => 'required|string|max:255',
            'identifier' => 'required|string|max:100|unique:pdas,identifier',
        ];
    }
}
