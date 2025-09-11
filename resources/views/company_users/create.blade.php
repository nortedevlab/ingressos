@extends('layouts.app')
@section('title', __('company_users.new'))

@section('content')
    <h1>@lang('company_users.new')</h1>
    <form action="{{ route('company-users.store') }}" method="POST">
        @include('company_users.form', ['companies' => $companies])
    </form>
@endsection
