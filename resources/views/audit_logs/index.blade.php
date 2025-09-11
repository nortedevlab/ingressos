@extends('layouts.app')

@section('title', __('audit_logs.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-clipboard-data"></i> @lang('audit_logs.title')</h1>
    </div>

    <table id="auditLogsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('audit_logs.user_type')</th>
            <th>@lang('audit_logs.user')</th>
            <th>@lang('audit_logs.action')</th>
            <th>@lang('audit_logs.ip')</th>
            <th>@lang('audit_logs.date')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ __("audit_logs.user_types.$log->user_type") }}</td>
                <td>{{ $log->user->name ?? '-' }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->ip ?? '-' }}</td>
                <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('audit-logs.show', $log) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(function(){
            $('#auditLogsTable').DataTable({
                order: [[4, 'desc']],
                language: { url: '{{ asset("vendor/datatables/i18n/pt-BR.json") }}' }
            });
        });
    </script>
@endsection
