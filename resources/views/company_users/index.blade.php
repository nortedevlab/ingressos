@extends('layouts.app')

@section('title', __('company_users.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-people"></i> @lang('company_users.title')</h1>
        <a href="{{ route('company-users.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('company_users.new')
        </a>
    </div>

    <table id="companyUsersTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('company_users.name')</th>
            <th>@lang('company_users.email')</th>
            <th>@lang('company_users.company')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->company->name }}</td>
                <td>
                    <a href="{{ route('company-users.show', $user) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('company-users.edit', $user) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('company-users.destroy', $user) }}" method="POST" class="d-inline delete-form">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(function(){
            $('#companyUsersTable').DataTable({
                language: { url: '{{ asset("vendor/datatables/i18n/pt-BR.json") }}' }
            });

            $('.delete-form').on('submit', function(e){
                e.preventDefault();
                let form = this;
                Swal.fire({
                    title: '@lang("messages.confirm_delete")',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '@lang("actions.confirm")',
                    cancelButtonText: '@lang("actions.cancel")'
                }).then((res) => {
                    if(res.isConfirmed) form.submit();
                });
            });
        });
    </script>
@endsection
