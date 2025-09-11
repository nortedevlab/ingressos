@extends('layouts.app')
@section('title', __('audit_logs.details'))

@section('content')
    <h1>@lang('audit_logs.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('audit_logs.user_type'):</strong> {{ __("audit_logs.user_types.$auditLog->user_type") }}</li>
        <li class="list-group-item"><strong>@lang('audit_logs.user'):</strong> {{ $auditLog->user->name ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('audit_logs.action'):</strong> {{ $auditLog->action }}</li>
        <li class="list-group-item"><strong>@lang('audit_logs.ip'):</strong> {{ $auditLog->ip ?? '-' }}</li>
        <li class="list-group-item"><strong>@lang('audit_logs.data'):</strong> <pre>{{ json_encode($auditLog->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre></li>
        <li class="list-group-item"><strong>@lang('audit_logs.date'):</strong> {{ $auditLog->created_at->format('d/m/Y H:i') }}</li>
    </ul>
@endsection
