@extends('layouts.app')
@section('title', __('payments.new'))

@section('content')
    <h1>@lang('payments.new')</h1>
    <form action="{{ route('payments.store') }}" method="POST">
        @include('payments.form', ['orders' => $orders])
    </form>
@endsection
