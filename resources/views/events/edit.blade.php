@extends('layouts.app')
@section('title', __('events.edit'))

@section('content')
    <h1>@lang('events.edit')</h1>
    <form action="{{ route('events.update', $event) }}" method="POST">
        @method('PUT')
        @include('events.form', ['event' => $event])
    </form>
@endsection
