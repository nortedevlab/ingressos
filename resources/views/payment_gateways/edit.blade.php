@extends('layouts.app')
@section('title', __('payment_gateways.edit'))

@section('content')
    <h1>@lang('payment_gateways.edit')</h1>
    <form action="{{ route('payment-gateways.update', $paymentGateway) }}" method="POST">
        @method('PUT')
        @include('payment_gateways.form', ['paymentGateway' => $paymentGateway, 'companies' => $companies])
    </form>
@endsection
