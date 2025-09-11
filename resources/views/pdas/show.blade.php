@extends('layouts.app')
@section('title', __('pdas.details'))

@section('content')
    <h1>@lang('pdas.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('pdas.identifier'):</strong> {{ $pda->identifier }}</li>
        <li class="list-group-item"><strong>@lang('pdas.event'):</strong> {{ $pda->event->title }}</li>
        <li class="list-group-item"><strong>@lang('pdas.gate'):</strong> {{ $pda->gate_name }}</li>
    </ul>
@endsection
