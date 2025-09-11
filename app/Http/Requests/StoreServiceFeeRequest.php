<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Taxa de Serviço
 */
class StoreServiceFeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => 'nullable|exists:companies,id',
            'event_id'   => 'nullable|exists:events,id',
            'batch_id'   => 'nullable|exists:batches,id',
            'fee_percent'=> 'nullable|numeric|min:0|max:100',
            'fee_value'  => 'nullable|numeric|min:0',
        ];
    }
}
