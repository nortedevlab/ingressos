@extends('layouts.app')
@section('title', __('companies.edit'))

@section('content')
    <h1>@lang('companies.edit')</h1>
    <form action="{{ route('companies.update',$company) }}" method="POST">
        @method('PUT')
        @include('companies.form',['company' => $company])
    </form>
@endsection


