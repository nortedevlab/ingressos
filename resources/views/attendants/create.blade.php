@extends('layouts.app')
@section('title', __('attendants.new'))

@section('content')
    <h1>@lang('attendants.new')</h1>
    <form action="{{ route('attendants.store') }}" method="POST">
        @include('attendants.form', ['booths' => $booths])
    </form>
@endsection
