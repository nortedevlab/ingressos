```bladehtml
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
$(document).ready(function() {
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
```
