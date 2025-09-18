@extends('layouts.admin')

@section('title', __('auth.login'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="h4 mb-3">@lang('auth.login')</h1>
            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">@lang('auth.email')</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">@lang('auth.password')</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">@lang('auth.login')</button>
            </form>
        </div>
    </div>
@endsection
