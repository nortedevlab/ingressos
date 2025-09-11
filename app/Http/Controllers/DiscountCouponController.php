<?php

namespace App\Http\Controllers;

use App\Models\DiscountCoupon;
use App\Models\Event;
use App\Services\DiscountCouponService;
use App\Http\Requests\StoreDiscountCouponRequest;
use App\Http\Requests\UpdateDiscountCouponRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controller Web para Cupons de Desconto / Cortesias
 */
class DiscountCouponController extends Controller
{
    public function __construct(
        private readonly DiscountCouponService $couponService
    ) {}

    public function index(): View
    {
        $coupons = $this->couponService->all();
        return view('discount_coupons.index', compact('coupons'));
    }

    public function create(): View
    {
        $events = Event::all();
        return view('discount_coupons.create', compact('events'));
    }

    public function store(StoreDiscountCouponRequest $request): RedirectResponse
    {
        $this->couponService->create($request->validated());
        return redirect()->route('discount-coupons.index')
            ->with('success', __('messages.coupon_created'));
    }

    public function show(DiscountCoupon $discountCoupon): View
    {
        return view('discount_coupons.show', compact('discountCoupon'));
    }

    public function edit(DiscountCoupon $discountCoupon): View
    {
        $events = Event::all();
        return view('discount_coupons.edit', compact('discountCoupon','events'));
    }

    public function update(UpdateDiscountCouponRequest $request, DiscountCoupon $discountCoupon): RedirectResponse
    {
        $this->couponService->update($discountCoupon, $request->validated());
        return redirect()->route('discount-coupons.index')
            ->with('success', __('messages.coupon_updated'));
    }

    public function destroy(DiscountCoupon $discountCoupon): RedirectResponse
    {
        $this->couponService->delete($discountCoupon);
        return redirect()->route('discount-coupons.index')
            ->with('success', __('messages.coupon_deleted'));
    }
}
