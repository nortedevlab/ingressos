@extends('layouts.app')
@section('title', __('events.new'))

@section('content')
    <h1>@lang('events.new')</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @include('events.form')
    </form>
@endsection
