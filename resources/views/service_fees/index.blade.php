@extends('layouts.app')

@section('title', __('service_fees.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-percent"></i> @lang('service_fees.title')</h1>
        <a href="{{ route('service-fees.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('service_fees.new')
        </a>
    </div>

    <table id="feesTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('service_fees.company')</th>
            <th>@lang('service_fees.event')</th>
            <th>@lang('service_fees.batch')</th>
            <th>@lang('service_fees.fee_percent')</th>
            <th>@lang('service_fees.fee_value')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fees as $fee)
            <tr>
                <td>{{ $fee->company->name ?? '-' }}</td>
                <td>{{ $fee->event->title ?? '-' }}</td>
                <td>{{ $fee->batch->name ?? '-' }}</td>
                <td>{{ $fee->fee_percent ? $fee->fee_percent.'%' : '-' }}</td>
                <td>{{ $fee->fee_value ? 'R$ '.number_format($fee->fee_value,2,',','.') : '-' }}</td>
                <td>
                    <a href="{{ route('service-fees.show', $fee) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('service-fees.edit', $fee) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('service-fees.destroy', $fee) }}" method="POST" class="d-inline delete-form">
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
            $('#feesTable').DataTable({
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
