@extends('layouts.app')

@section('title', __('payments.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-credit-card"></i> @lang('payments.title')</h1>
        <a href="{{ route('payments.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('payments.new')
        </a>
    </div>

    <table id="paymentsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('payments.id')</th>
            <th>@lang('payments.order')</th>
            <th>@lang('payments.method')</th>
            <th>@lang('payments.amount')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>#{{ $payment->id }}</td>
                <td>#{{ $payment->order->id }}</td>
                <td>{{ __("payments.methods.".$payment->method) }}</td>
                <td>R$ {{ number_format($payment->amount, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('payments.show', $payment) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="d-inline delete-form">
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
            $('#paymentsTable').DataTable({
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
