<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Atendente
 */
class UpdateAttendantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'booth_id' => 'required|exists:booths,id',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:attendants,email,' . $this->attendant->id,
            'password' => 'nullable|string|min:6|confirmed',
        ];
    }
}
