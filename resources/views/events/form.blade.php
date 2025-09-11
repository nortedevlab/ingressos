@csrf
<div class="mb-3">
    <label class="form-label">@lang('events.name')</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $event->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('events.location')</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $event->location ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('events.start_date')</label>
    <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date', isset($event) ? $event->start_date->format('Y-m-d\TH:i') : '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('events.end_date')</label>
    <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date', isset($event) ? $event->end_date->format('Y-m-d\TH:i') : '') }}">
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
