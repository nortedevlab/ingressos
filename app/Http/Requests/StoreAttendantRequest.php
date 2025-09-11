<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Atendente
 */
class StoreAttendantRequest extends FormRequest
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
            'email'    => 'required|email|max:255|unique:attendants,email',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
