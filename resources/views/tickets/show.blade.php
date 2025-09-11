@extends('layouts.app')
@section('title', __('tickets.details'))

@section('content')
    <h1>@lang('tickets.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('tickets.name'):</strong> {{ $ticket->name }}</li>
        <li class="list-group-item"><strong>@lang('tickets.price'):</strong> R$ {{ number_format($ticket->price, 2, ',', '.') }}</li>
        <li class="list-group-item"><strong>@lang('tickets.event'):</strong> {{ $ticket->event->title }}</li>
    </ul>
@endsection
