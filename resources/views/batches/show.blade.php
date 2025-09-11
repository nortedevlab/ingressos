@extends('layouts.app')
@section('title', __('batches.details'))

@section('content')
    <h1>@lang('batches.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('batches.name'):</strong> {{ $batch->name }}</li>
        <li class="list-group-item"><strong>@lang('batches.ticket'):</strong> {{ $batch->ticket->name }}</li>
        <li class="list-group-item"><strong>@lang('batches.price'):</strong> R$ {{ number_format($batch->price, 2, ',', '.') }}</li>
        <li class="list-group-item"><strong>@lang('batches.quantity'):</strong> {{ $batch->quantity ?? __('batches.unlimited') }}</li>
        <li class="list-group-item"><strong>@lang('batches.start_date'):</strong> {{ $batch->start_date->format('d/m/Y H:i') }}</li>
        <li class="list-group-item"><strong>@lang('batches.end_date'):</strong> {{ $batch->end_date->format('d/m/Y H:i') }}</li>
    </ul>
@endsection
