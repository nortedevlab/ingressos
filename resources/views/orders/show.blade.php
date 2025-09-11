@extends('layouts.app')
@section('title', __('orders.details'))

@section('content')
    <h1>@lang('orders.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('orders.id'):</strong> #{{ $order->id }}</li>
        <li class="list-group-item"><strong>@lang('orders.client'):</strong> {{ $order->client->name ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('orders.event'):</strong> {{ $order->event->title }}</li>
        <li class="list-group-item"><strong>@lang('orders.total'):</strong> R$ {{ number_format($order->total, 2, ',', '.') }}</li>
    </ul>
@endsection
