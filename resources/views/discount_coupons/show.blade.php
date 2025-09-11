@extends('layouts.app')
@section('title', __('discount_coupons.details'))

@section('content')
    <h1>@lang('discount_coupons.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('discount_coupons.code'):</strong> {{ $discountCoupon->code }}</li>
        <li class="list-group-item"><strong>@lang('discount_coupons.event'):</strong> {{ $discountCoupon->event->title }}</li>
        <li class="list-group-item"><strong>@lang('discount_coupons.discount_value'):</strong>
            {{ $discountCoupon->discount_value ? 'R$ '.number_format($discountCoupon->discount_value,2,',','.') : '-' }}
        </li>
        <li class="list-group-item"><strong>@lang('discount_coupons.discount_percent'):</strong>
            {{ $discountCoupon->discount_percent ? $discountCoupon->discount_percent.'%' : '-' }}
        </li>
        <li class="list-group-item"><strong>@lang('discount_coupons.max_usage'):</strong>
            {{ $discountCoupon->max_usage ?? '∞' }}
        </li>
        <li class="list-group-item"><strong>@lang('discount_coupons.used'):</strong>
            {{ $discountCoupon->used }}
        </li>
    </ul>
@endsection
