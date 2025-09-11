@extends('layouts.app')
@section('title', __('discount_coupons.edit'))

@section('content')
    <h1>@lang('discount_coupons.edit')</h1>
    <form action="{{ route('discount-coupons.update', $discountCoupon) }}" method="POST">
        @method('PUT')
        @include('discount_coupons.form', ['discountCoupon' => $discountCoupon, 'events' => $events])
    </form>
@endsection
