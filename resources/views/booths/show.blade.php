@extends('layouts.app')
@section('title', __('booths.details'))

@section('content')
    <h1>@lang('booths.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('booths.name'):</strong> {{ $booth->name }}</li>
        <li class="list-group-item"><strong>@lang('booths.event'):</strong> {{ $booth->event->title }}</li>
    </ul>
@endsection
