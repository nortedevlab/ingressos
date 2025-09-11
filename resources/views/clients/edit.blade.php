@extends('layouts.app')
@section('title', __('clients.edit'))

@section('content')
    <h1>@lang('clients.edit')</h1>
    <form action="{{ route('clients.update', $client) }}" method="POST">
        @method('PUT')
        @include('clients.form', ['client' => $client])
    </form>
@endsection
