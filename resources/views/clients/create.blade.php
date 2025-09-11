@extends('layouts.app')
@section('title', __('clients.new'))

@section('content')
    <h1>@lang('clients.new')</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @include('clients.form')
    </form>
@endsection
