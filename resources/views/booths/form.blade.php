@csrf
<div class="mb-3">
    <label class="form-label">@lang('booths.event')</label>
    <select name="event_id" class="form-select" required>
        <option value="">@lang('booths.select_event')</option>
        @foreach($events as $event)
            <option value="{{ $event->id }}" @selected(old('event_id', $booth->event_id ?? '') == $event->id)>
                {{ $event->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('booths.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $booth->name ?? '') }}" required>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
