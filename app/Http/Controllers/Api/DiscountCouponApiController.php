<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupon;
use App\Services\DiscountCouponService;
use App\Http\Requests\StoreDiscountCouponRequest;
use App\Http\Requests\UpdateDiscountCouponRequest;
use Illuminate\Http\JsonResponse;

/**
 * API Controller para Cupons de Desconto / Cortesias
 */
class DiscountCouponApiController extends Controller
{
    public function __construct(
        private readonly DiscountCouponService $couponService
    ) {}

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => __('messages.coupon_listed'),
            'data'    => $this->couponService->all()
        ]);
    }

    public function store(StoreDiscountCouponRequest $request): JsonResponse
    {
        $coupon = $this->couponService->create($request->validated());
        return response()->json([
            'message' => __('messages.coupon_created'),
            'data'    => $coupon
        ], 201);
    }

    public function show(DiscountCoupon $discountCoupon): JsonResponse
    {
        return response()->json([
            'message' => __('messages.coupon_fetched'),
            'data'    => $discountCoupon
        ]);
    }

    public function update(UpdateDiscountCouponRequest $request, DiscountCoupon $discountCoupon): JsonResponse
    {
        $updated = $this->couponService->update($discountCoupon, $request->validated());
        return response()->json([
            'message' => __('messages.coupon_updated'),
            'data'    => $updated
        ]);
    }

    public function destroy(DiscountCoupon $discountCoupon): JsonResponse
    {
        $this->couponService->delete($discountCoupon);
        return response()->json([
            'message' => __('messages.coupon_deleted'),
        ], 204);
    }
}
