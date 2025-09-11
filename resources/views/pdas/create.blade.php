@extends('layouts.app')
@section('title', __('pdas.new'))

@section('content')
    <h1>@lang('pdas.new')</h1>
    <form action="{{ route('pdas.store') }}" method="POST">
        @include('pdas.form', ['events' => $events])
    </form>
@endsection
