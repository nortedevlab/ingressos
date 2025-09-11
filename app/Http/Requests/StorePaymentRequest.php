<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Pagamento
 */
class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id'       => 'required|exists:orders,id',
            'method'         => 'required|string',
            'amount'         => 'required|numeric|min:0',
            'transaction_id' => 'nullable|string|max:255',
        ];
    }
}
