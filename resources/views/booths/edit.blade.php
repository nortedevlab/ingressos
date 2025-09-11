@extends('layouts.app')
@section('title', __('booths.edit'))

@section('content')
    <h1>@lang('booths.edit')</h1>
    <form action="{{ route('booths.update', $booth) }}" method="POST">
        @method('PUT')
        @include('booths.form', ['booth' => $booth, 'events' => $events])
    </form>
@endsection
