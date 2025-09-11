@extends('layouts.app')
@section('title', __('company_users.edit'))

@section('content')
    <h1>@lang('company_users.edit')</h1>
    <form action="{{ route('company-users.update', $companyUser) }}" method="POST">
        @method('PUT')
        @include('company_users.form', ['companyUser' => $companyUser, 'companies' => $companies])
    </form>
@endsection
