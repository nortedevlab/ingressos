@extends('layouts.app')

@section('title', __('batches.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-layers"></i> @lang('batches.title')</h1>
        <a href="{{ route('batches.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('batches.new')
        </a>
    </div>

    <table id="batchesTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('batches.name')</th>
            <th>@lang('batches.ticket')</th>
            <th>@lang('batches.price')</th>
            <th>@lang('batches.quantity')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($batches as $batch)
            <tr>
                <td>{{ $batch->name }}</td>
                <td>{{ $batch->ticket->name }}</td>
                <td>R$ {{ number_format($batch->price, 2, ',', '.') }}</td>
                <td>{{ $batch->quantity ?? __('batches.unlimited') }}</td>
                <td>
                    <a href="{{ route('batches.show', $batch) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('batches.edit', $batch) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('batches.destroy', $batch) }}" method="POST" class="d-inline delete-form">
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
            $('#batchesTable').DataTable({
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
