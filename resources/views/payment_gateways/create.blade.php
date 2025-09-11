@extends('layouts.app')
@section('title', __('payment_gateways.new'))

@section('content')
    <h1>@lang('payment_gateways.new')</h1>
    <form action="{{ route('payment-gateways.store') }}" method="POST">
        @include('payment_gateways.form', ['companies' => $companies])
    </form>
@endsection
