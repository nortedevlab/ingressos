<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request para atualização de Cupom de Desconto / Cortesia
 */
class UpdateDiscountCouponRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code'            => 'required|string|max:50|unique:discount_coupons,code,' . $this->discount_coupon->id,
            'discount_value'  => 'nullable|numeric|min:0',
            'discount_percent'=> 'nullable|integer|min:1|max:100',
            'max_usage'       => 'nullable|integer|min:1',
        ];
    }
}
