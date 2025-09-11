@extends('layouts.app')
@section('title', __('payments.edit'))

@section('content')
    <h1>@lang('payments.edit')</h1>
    <form action="{{ route('payments.update', $payment) }}" method="POST">
        @method('PUT')
        @include('payments.form', ['payment' => $payment, 'orders' => $orders])
    </form>
@endsection
