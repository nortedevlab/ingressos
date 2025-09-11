@extends('layouts.app')

@section('title', __('access_logs.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-journal-text"></i> @lang('access_logs.title')</h1>
    </div>

    <table id="logsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('access_logs.ticket')</th>
            <th>@lang('access_logs.event')</th>
            <th>@lang('access_logs.pda')</th>
            <th>@lang('access_logs.status')</th>
            <th>@lang('access_logs.message')</th>
            <th>@lang('access_logs.date')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>#{{ $log->ticket->id }}</td>
                <td>{{ $log->ticket->event->title }}</td>
                <td>{{ $log->pda->identifier }} ({{ $log->pda->gate_name }})</td>
                <td>
                    @if($log->status === 'allowed')
                        <span class="badge bg-success">@lang('access_logs.allowed')</span>
                    @else
                        <span class="badge bg-danger">@lang('access_logs.denied')</span>
                    @endif
                </td>
                <td>{{ $log->message ?? '-' }}</td>
                <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('access-logs.show', $log) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(function(){
            $('#logsTable').DataTable({
                order: [[5, 'desc']],
                language: { url: '{{ asset("vendor/datatables/i18n/pt-BR.json") }}' }
            });
        });
    </script>
@endsection
