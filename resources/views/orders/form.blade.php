@csrf
<div class="mb-3">
    <label class="form-label">@lang('orders.client')</label>
    <select name="client_id" class="form-select">
        <option value="">@lang('orders.select_client')</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" @selected(old('client_id', $order->client_id ?? '') == $client->id)>
                {{ $client->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('orders.event')</label>
    <select name="event_id" class="form-select" required>
        <option value="">@lang('orders.select_event')</option>
        @foreach($events as $event)
            <option value="{{ $event->id }}" @selected(old('event_id', $order->event_id ?? '') == $event->id)>
                {{ $event->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('orders.total')</label>
    <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total', $order->total ?? '') }}" required>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
