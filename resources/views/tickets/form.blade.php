@csrf
<div class="mb-3">
    <label class="form-label">@lang('tickets.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $ticket->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('tickets.price')</label>
    <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $ticket->price ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('tickets.event')</label>
    <select name="event_id" class="form-select" required>
        <option value="">@lang('tickets.select_event')</option>
        @foreach($events as $event)
            <option value="{{ $event->id }}" @selected(old('event_id', $ticket->event_id ?? '') == $event->id)>
                {{ $event->title }}
            </option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
