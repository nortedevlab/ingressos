@extends('layouts.app')
@section('title', __('attendants.edit'))

@section('content')
    <h1>@lang('attendants.edit')</h1>
    <form action="{{ route('attendants.update', $attendant) }}" method="POST">
        @method('PUT')
        @include('attendants.form', ['attendant' => $attendant, 'booths' => $booths])
    </form>
@endsection
