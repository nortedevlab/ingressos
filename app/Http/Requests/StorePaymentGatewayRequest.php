<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Gateway de Pagamento
 */
class StorePaymentGatewayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => 'nullable|exists:companies,id',
            'name'       => 'required|string|max:255',
            'provider'   => 'required|string|max:255',
            'config'     => 'required|array',
            'is_default' => 'boolean',
        ];
    }
}
