@extends('layouts.app')

@section('title', __('payment_gateways.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-credit-card-2-front"></i> @lang('payment_gateways.title')</h1>
        <a href="{{ route('payment-gateways.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('payment_gateways.new')
        </a>
    </div>

    <table id="gatewaysTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('payment_gateways.name')</th>
            <th>@lang('payment_gateways.provider')</th>
            <th>@lang('payment_gateways.company')</th>
            <th>@lang('payment_gateways.default')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gateways as $gateway)
            <tr>
                <td>{{ $gateway->name }}</td>
                <td>{{ $gateway->provider }}</td>
                <td>{{ $gateway->company->name ?? __('payment_gateways.global') }}</td>
                <td>{!! $gateway->is_default ? '<span class="badge bg-success">Sim</span>' : '<span class="badge bg-secondary">Não</span>' !!}</td>
                <td>
                    <a href="{{ route('payment-gateways.show', $gateway) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('payment-gateways.edit', $gateway) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('payment-gateways.destroy', $gateway) }}" method="POST" class="d-inline delete-form">
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
            $('#gatewaysTable').DataTable({
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
