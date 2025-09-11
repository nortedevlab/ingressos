@extends('layouts.app')
@section('title', __('discount_coupons.new'))

@section('content')
    <h1>@lang('discount_coupons.new')</h1>
    <form action="{{ route('discount-coupons.store') }}" method="POST">
        @include('discount_coupons.form', ['events' => $events])
    </form>
@endsection
