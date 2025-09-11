<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para criação de Cupom de Desconto / Cortesia
 */
class StoreDiscountCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_id'        => 'required|exists:events,id',
            'code'            => 'required|string|max:50|unique:discount_coupons,code',
            'discount_value'  => 'nullable|numeric|min:0',
            'discount_percent'=> 'nullable|integer|min:1|max:100',
            'max_usage'       => 'nullable|integer|min:1',
        ];
    }
}
