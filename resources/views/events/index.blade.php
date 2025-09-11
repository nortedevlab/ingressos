@extends('layouts.app')

@section('title', __('events.title'))

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1><i class="bi bi-calendar-event"></i> @lang('events.title')</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> @lang('events.new')
        </a>
    </div>

    <table id="eventsTable" class="table table-striped">
        <thead>
        <tr>
            <th>@lang('events.name')</th>
            <th>@lang('events.date')</th>
            <th>@lang('events.location')</th>
            <th>@lang('actions.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->start_date->format('d/m/Y H:i') }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <a href="{{ route('events.show', $event) }}" class="btn btn-sm btn-info">
                        <i class="bi bi-eye"></i> @lang('actions.view')
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#eventsTable').DataTable({
                language: {
                    url: '{{ asset("vendor/datatables/i18n/pt-BR.json") }}'
                },
                pageLength: 10,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
@endsection
