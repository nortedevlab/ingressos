@extends('layouts.app')

@section('title', __('pdas.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-phone"></i> @lang('pdas.title')</h1>
        <a href="{{ route('pdas.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('pdas.new')
        </a>
    </div>

    <table id="pdasTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('pdas.identifier')</th>
            <th>@lang('pdas.event')</th>
            <th>@lang('pdas.gate')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pdas as $pda)
            <tr>
                <td>{{ $pda->identifier }}</td>
                <td>{{ $pda->event->title }}</td>
                <td>{{ $pda->gate_name }}</td>
                <td>
                    <a href="{{ route('pdas.show', $pda) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('pdas.edit', $pda) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('pdas.destroy', $pda) }}" method="POST" class="d-inline delete-form">
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
            $('#pdasTable').DataTable({
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
