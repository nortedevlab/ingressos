<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Gateway de Pagamento
 */
class UpdatePaymentGatewayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255',
            'provider'   => 'required|string|max:255',
            'config'     => 'required|array',
            'is_default' => 'boolean',
        ];
    }
}
