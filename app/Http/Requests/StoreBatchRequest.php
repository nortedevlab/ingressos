<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Lote de Ingressos
 */
class StoreBatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ticket_id'  => 'required|exists:tickets,id',
            'name'       => 'required|string|max:255',
            'quantity'   => 'nullable|integer|min:0',
            'price'      => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
        ];
    }
}
