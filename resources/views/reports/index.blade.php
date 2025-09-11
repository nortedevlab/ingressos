@extends('layouts.app')

@section('title', __('reports.title'))

@section('content')
    <h1><i class="bi bi-graph-up"></i> @lang('reports.title')</h1>

    <form action="{{ route('reports.generate') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">@lang('reports.event')</label>
            <select name="event_id" class="form-select">
                <option value="">@lang('reports.all_events')</option>
                @foreach(\App\Models\Event::all() as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">@lang('reports.from_date')</label>
            <input type="date" name="from_date" class="form-control">
        </div>
        <div class="col-md-2">
            <label class="form-label">@lang('reports.to_date')</label>
            <input type="date" name="to_date" class="form-control">
        </div>
        <div class="col-md-2">
            <label class="form-label">@lang('reports.status')</label>
            <select name="status" class="form-select">
                <option value="">@lang('reports.all')</option>
                <option value="paid">@lang('reports.paid')</option>
                <option value="pending">@lang('reports.pending')</option>
                <option value="canceled">@lang('reports.canceled')</option>
                <option value="refunded">@lang('reports.refunded')</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary me-2">@lang('reports.filter')</button>
            <button type="submit" name="format" value="csv" class="btn btn-success me-2">@lang('reports.export_csv')</button>
            <button type="submit" name="format" value="pdf" class="btn btn-danger">@lang('reports.export_pdf')</button>
        </div>
    </form>

    @if(isset($data))
        <table id="reportsTable" class="table table-striped">
            <thead>
            <tr>
                <th>@lang('reports.order_id')</th>
                <th>@lang('reports.client')</th>
                <th>@lang('reports.event')</th>
                <th>@lang('reports.total')</th>
                <th>@lang('reports.status')</th>
                <th>@lang('reports.date')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->client->name ?? '-' }}</td>
                    <td>{{ $order->event->title }}</td>
                    <td>R$ {{ number_format($order->total, 2, ',', '.') }}</td>
                    <td>{{ $order->payments->first()->status ?? 'N/A' }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            $(function(){
                $('#reportsTable').DataTable({
                    order: [[5, 'desc']],
                    language: { url: '{{ asset("vendor/datatables/i18n/pt-BR.json") }}' }
                });
            });
        </script>
    @endif
@endsection
