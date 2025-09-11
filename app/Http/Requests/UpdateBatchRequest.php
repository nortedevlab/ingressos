<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Lote de Ingressos
 */
class UpdateBatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255',
            'quantity'   => 'nullable|integer|min:0',
            'price'      => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
        ];
    }
}
