@extends('layouts.app')
@section('title', __('batches.new'))

@section('content')
    <h1>@lang('batches.new')</h1>
    <form action="{{ route('batches.store') }}" method="POST">
        @include('batches.form', ['tickets' => $tickets])
    </form>
@endsection
