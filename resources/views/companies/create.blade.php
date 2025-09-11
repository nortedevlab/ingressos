@extends('layouts.app')
@section('title', __('companies.new'))

@section('content')
    <h1>@lang('companies.new')</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @include('companies.form')
    </form>
@endsection
