@extends('layouts.app')
@section('title', __('clients.details'))

@section('content')
    <h1>@lang('clients.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('clients.name'):</strong> {{ $client->name }}</li>
        <li class="list-group-item"><strong>@lang('clients.document'):</strong> {{ $client->document }}</li>
        <li class="list-group-item"><strong>@lang('clients.email'):</strong> {{ $client->email }}</li>
        <li class="list-group-item"><strong>@lang('clients.phone'):</strong> {{ $client->phone }}</li>
    </ul>
@endsection
