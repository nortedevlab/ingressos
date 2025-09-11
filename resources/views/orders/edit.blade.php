@extends('layouts.app')
@section('title', __('orders.edit'))

@section('content')
    <h1>@lang('orders.edit')</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @method('PUT')
        @include('orders.form', ['order' => $order, 'clients' => $clients, 'events' => $events])
    </form>
@endsection
