@extends('layouts.app')
@section('title', __('booths.new'))

@section('content')
    <h1>@lang('booths.new')</h1>
    <form action="{{ route('booths.store') }}" method="POST">
        @include('booths.form', ['events' => $events])
    </form>
@endsection
