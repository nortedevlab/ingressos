@extends('layouts.app')
@section('title', __('service_fees.edit'))

@section('content')
    <h1>@lang('service_fees.edit')</h1>
    <form action="{{ route('service-fees.update', $serviceFee) }}" method="POST">
        @method('PUT')
        @include('service_fees.form', ['serviceFee' => $serviceFee, 'companies' => $companies, 'events' => $events, 'batches' => $batches])
    </form>
@endsection
