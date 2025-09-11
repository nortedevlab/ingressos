<?php

namespace App\Services;

use App\Models\DiscountCoupon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Serviço para Cupons de Desconto e Cortesias
 */
class DiscountCouponService
{
    public function all(): Collection
    {
        return DiscountCoupon::with('event')->get();
    }

    public function create(array $data): DiscountCoupon
    {
        return DiscountCoupon::create($data);
    }

    public function update(DiscountCoupon $coupon, array $data): DiscountCoupon
    {
        $coupon->update($data);
        return $coupon;
    }

    public function delete(DiscountCoupon $coupon): ?bool
    {
        return $coupon->delete();
    }
}
