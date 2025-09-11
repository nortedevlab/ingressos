@extends('layouts.app')
@section('title', __('service_fees.new'))

@section('content')
    <h1>@lang('service_fees.new')</h1>
    <form action="{{ route('service-fees.store') }}" method="POST">
        @include('service_fees.form', ['companies' => $companies, 'events' => $events, 'batches' => $batches])
    </form>
@endsection
