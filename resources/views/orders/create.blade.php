@extends('layouts.app')
@section('title', __('orders.new'))

@section('content')
    <h1>@lang('orders.new')</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @include('orders.form', ['clients' => $clients, 'events' => $events])
    </form>
@endsection
