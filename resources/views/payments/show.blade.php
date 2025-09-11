@extends('layouts.app')
@section('title', __('payments.details'))

@section('content')
    <h1>@lang('payments.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('payments.id'):</strong> #{{ $payment->id }}</li>
        <li class="list-group-item"><strong>@lang('payments.order'):</strong> #{{ $payment->order->id }} - {{ $payment->order->event->title }}</li>
        <li class="list-group-item"><strong>@lang('payments.method'):</strong> {{ __("payments.methods.".$payment->method) }}</li>
        <li class="list-group-item"><strong>@lang('payments.amount'):</strong> R$ {{ number_format($payment->amount, 2, ',', '.') }}</li>
        <li class="list-group-item"><strong>@lang('payments.transaction_id'):</strong> {{ $payment->transaction_id ?? '-' }}</li>
    </ul>
@endsection
