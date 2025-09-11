<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para registro de Log de Acesso
 * (usado principalmente na API para registrar entrada/saída)
 */
class StoreAccessLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pda_id'    => 'required|exists:pdas,id',
            'ticket_id' => 'required|exists:tickets,id',
            'status'    => 'required|string|in:allowed,denied',
            'message'   => 'nullable|string|max:255',
        ];
    }
}
