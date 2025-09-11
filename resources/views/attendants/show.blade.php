@extends('layouts.app')
@section('title', __('attendants.details'))

@section('content')
    <h1>@lang('attendants.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('attendants.name'):</strong> {{ $attendant->name }}</li>
        <li class="list-group-item"><strong>@lang('attendants.email'):</strong> {{ $attendant->email }}</li>
        <li class="list-group-item"><strong>@lang('attendants.booth'):</strong> {{ $attendant->booth->name }}</li>
    </ul>
@endsection
