@extends('layouts.app')

@section('title', __('attendants.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-person-badge"></i> @lang('attendants.title')</h1>
        <a href="{{ route('attendants.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('attendants.new')
        </a>
    </div>

    <table id="attendantsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('attendants.name')</th>
            <th>@lang('attendants.email')</th>
            <th>@lang('attendants.booth')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendants as $attendant)
            <tr>
                <td>{{ $attendant->name }}</td>
                <td>{{ $attendant->email }}</td>
                <td>{{ $attendant->booth->name }}</td>
                <td>
                    <a href="{{ route('attendants.show', $attendant) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('attendants.edit', $attendant) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('attendants.destroy', $attendant) }}" method="POST" class="d-inline delete-form">
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
            $('#attendantsTable').DataTable({
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
