@extends('layouts.app')
@section('title', __('service_fees.details'))

@section('content')
    <h1>@lang('service_fees.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('service_fees.company'):</strong> {{ $serviceFee->company->name ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('service_fees.event'):</strong> {{ $serviceFee->event->title ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('service_fees.batch'):</strong> {{ $serviceFee->batch->name ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('service_fees.fee_percent'):</strong> {{ $serviceFee->fee_percent ? $serviceFee->fee_percent.'%' : '-' }}</li>
        <li class="list-group-item"><strong>@lang('service_fees.fee_value'):</strong> {{ $serviceFee->fee_value ? 'R$ '.number_format($serviceFee->fee_value,2,',','.') : '-' }}</li>
    </ul>
@endsection
