@extends('layouts.app')
@section('title', __('payment_gateways.details'))

@section('content')
    <h1>@lang('payment_gateways.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('payment_gateways.name'):</strong> {{ $paymentGateway->name }}</li>
        <li class="list-group-item"><strong>@lang('payment_gateways.provider'):</strong> {{ $paymentGateway->provider }}</li>
        <li class="list-group-item"><strong>@lang('payment_gateways.company'):</strong> {{ $paymentGateway->company->name ?? __('payment_gateways.global') }}</li>
        <li class="list-group-item"><strong>@lang('payment_gateways.config'):</strong> <pre>{{ json_encode($paymentGateway->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></li>
        <li class="list-group-item"><strong>@lang('payment_gateways.default'):</strong> {{ $paymentGateway->is_default ? __('actions.yes') : __('actions.no') }}</li>
    </ul>
@endsection
