@extends('layouts.app')
@section('title', __('access_logs.details'))

@section('content')
    <h1>@lang('access_logs.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('access_logs.ticket'):</strong> #{{ $accessLog->ticket->id }}</li>
        <li class="list-group-item"><strong>@lang('access_logs.event'):</strong> {{ $accessLog->ticket->event->title }}</li>
        <li class="list-group-item"><strong>@lang('access_logs.pda'):</strong> {{ $accessLog->pda->identifier }} ({{ $accessLog->pda->gate_name }})</li>
        <li class="list-group-item"><strong>@lang('access_logs.status'):</strong>
            {{ $accessLog->status === 'allowed' ? __('access_logs.allowed') : __('access_logs.denied') }}
        </li>
        <li class="list-group-item"><strong>@lang('access_logs.message'):</strong> {{ $accessLog->message ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('access_logs.date'):</strong> {{ $accessLog->created_at->format('d/m/Y H:i') }}</li>
    </ul>
@endsection
