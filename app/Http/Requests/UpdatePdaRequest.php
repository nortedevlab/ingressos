<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de PDA
 */
class UpdatePdaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'gate_name'  => 'required|string|max:255',
            'identifier' => 'required|string|max:100|unique:pdas,identifier,' . $this->pda->id,
        ];
    }
}
