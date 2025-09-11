@extends('layouts.app')
@section('title', __('companies.details'))

@section('content')
    <h1>@lang('companies.details')</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>@lang('companies.name'):</strong> {{ $company->name }}</li>
        <li class="list-group-item"><strong>@lang('companies.document'):</strong> {{ $company->document }}</li>
        <li class="list-group-item"><strong>@lang('companies.email'):</strong> {{ $company->email }}</li>
        <li class="list-group-item"><strong>@lang('companies.phone'):</strong> {{ $company->phone }}</li>
    </ul>
@endsection
