@extends('layouts.app')
@section('title', __('company_users.details'))

@section('content')
    <h1>@lang('company_users.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('company_users.name'):</strong> {{ $companyUser->name }}</li>
        <li class="list-group-item"><strong>@lang('company_users.email'):</strong> {{ $companyUser->email }}</li>
        <li class="list-group-item"><strong>@lang('company_users.company'):</strong> {{ $companyUser->company->name }}</li>
    </ul>
@endsection
