<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Taxa de Serviço
 */
class UpdateServiceFeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fee_percent'=> 'nullable|numeric|min:0|max:100',
            'fee_value'  => 'nullable|numeric|min:0',
        ];
    }
}
