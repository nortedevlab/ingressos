@extends('layouts.app')

@section('title', __('discount_coupons.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-ticket"></i> @lang('discount_coupons.title')</h1>
        <a href="{{ route('discount-coupons.create') }}" class="btn btn-primary btn-submit">
            <span class="spinner-border spinner-border-sm d-none"></span>
            <i class="bi bi-plus-circle"></i> @lang('discount_coupons.new')
        </a>
    </div>

    <table id="couponsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('discount_coupons.code')</th>
            <th>@lang('discount_coupons.event')</th>
            <th>@lang('discount_coupons.type')</th>
            <th>@lang('discount_coupons.usage')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon->code }}</td>
                <td>{{ $coupon->event->title }}</td>
                <td>
                    @if($coupon->discount_value)
                        R$ {{ number_format($coupon->discount_value, 2, ',', '.') }}
                    @elseif($coupon->discount_percent)
                        {{ $coupon->discount_percent }}%
                    @else
                        @lang('discount_coupons.courtesy')
                    @endif
                </td>
                <td>{{ $coupon->used }}/{{ $coupon->max_usage ?? '∞' }}</td>
                <td>
                    <a href="{{ route('discount-coupons.show', $coupon) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{ route('discount-coupons.edit', $coupon) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('discount-coupons.destroy', $coupon) }}" method="POST" class="d-inline delete-form">
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
            $('#couponsTable').DataTable({
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
