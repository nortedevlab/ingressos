@csrf
<div class="mb-3">
    <label class="form-label">@lang('batches.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $batch->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('batches.ticket')</label>
    <select name="ticket_id" class="form-select" required>
        <option value="">@lang('batches.select_ticket')</option>
        @foreach($tickets as $ticket)
            <option value="{{ $ticket->id }}" @selected(old('ticket_id', $batch->ticket_id ?? '') == $ticket->id)>
                {{ $ticket->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('batches.price')</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $batch->price ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('batches.quantity')</label>
    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $batch->quantity ?? '') }}">
    <small class="text-muted">@lang('batches.null_unlimited')</small>
</div>
<div class="mb-3">
    <label class="form-label">@lang('batches.start_date')</label>
    <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date', isset($batch) ? $batch->start_date->format('Y-m-d\TH:i') : '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('batches.end_date')</label>
    <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date', isset($batch) ? $batch->end_date->format('Y-m-d\TH:i') : '') }}" required>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
