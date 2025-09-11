@extends('layouts.app')
@section('title', __('tickets.new'))

@section('content')
    <h1>@lang('tickets.new')</h1>
    <form action="{{ route('tickets.store') }}" method="POST">
        @include('tickets.form', ['events' => $events])
    </form>
@endsection
