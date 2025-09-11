@extends('layouts.app')

@section('title', __('clients.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-people"></i> @lang('clients.title')</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('clients.new')
        </a>
    </div>

    <table id="clientsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('clients.name')</th>
            <th>@lang('clients.document')</th>
            <th>@lang('clients.email')</th>
            <th>@lang('clients.phone')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->document }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>
                    <a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline delete-form">
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
        $(function () {
            $('#clientsTable').DataTable({
                language: {url: '{{ asset("vendor/datatables/i18n/pt-BR.json") }}'}
            });

            $('.delete-form').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                Swal.fire({
                    title: '@lang("messages.confirm_delete")',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '@lang("actions.confirm")',
                    cancelButtonText: '@lang("actions.cancel")'
                }).then((res) => {
                    if (res.isConfirmed) form.submit();
                });
            });
        });
    </script>
@endsection
