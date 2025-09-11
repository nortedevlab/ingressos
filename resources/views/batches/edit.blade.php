@extends('layouts.app')
@section('title', __('batches.edit'))

@section('content')
    <h1>@lang('batches.edit')</h1>
    <form action="{{ route('batches.update', $batch) }}" method="POST">
        @method('PUT')
        @include('batches.form', ['batch' => $batch, 'tickets' => $tickets])
    </form>
@endsection
