@csrf
<div class="mb-3">
    <label class="form-label">@lang('pdas.event')</label>
    <select name="event_id" class="form-select" required>
        <option value="">@lang('pdas.select_event')</option>
        @foreach($events as $event)
            <option value="{{ $event->id }}" @selected(old('event_id', $pda->event_id ?? '') == $event->id)>
                {{ $event->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('pdas.gate')</label>
    <input type="text" name="gate_name" class="form-control" value="{{ old('gate_name', $pda->gate_name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('pdas.identifier')</label>
    <input type="text" name="identifier" class="form-control" value="{{ old('identifier', $pda->identifier ?? '') }}" required>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
