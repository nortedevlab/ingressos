<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Pagamento
 */
class UpdatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'method'         => 'required|string',
            'amount'         => 'required|numeric|min:0',
            'transaction_id' => 'nullable|string|max:255',
        ];
    }
}
