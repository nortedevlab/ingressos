@extends('layouts.app')
@section('title', __('pdas.edit'))

@section('content')
    <h1>@lang('pdas.edit')</h1>
    <form action="{{ route('pdas.update', $pda) }}" method="POST">
        @method('PUT')
        @include('pdas.form', ['pda' => $pda, 'events' => $events])
    </form>
@endsection
