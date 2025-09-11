@extends('layouts.app')
@section('title', __('tickets.edit'))

@section('content')
    <h1>@lang('tickets.edit')</h1>
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @method('PUT')
        @include('tickets.form', ['ticket' => $ticket, 'events' => $events])
    </form>
@endsection
