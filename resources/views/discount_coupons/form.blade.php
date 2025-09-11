@csrf
<div class="mb-3">
    <label class="form-label">@lang('discount_coupons.event')</label>
    <select name="event_id" class="form-select" required>
        <option value="">@lang('discount_coupons.select_event')</option>
        @foreach($events as $event)
            <option value="{{ $event->id }}" @selected(old('event_id', $discountCoupon->event_id ?? '') == $event->id)>
                {{ $event->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('discount_coupons.code')</label>
    <input type="text" name="code" class="form-control" value="{{ old('code', $discountCoupon->code ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('discount_coupons.discount_value')</label>
    <input type="number" step="0.01" name="discount_value" class="form-control" value="{{ old('discount_value', $discountCoupon->discount_value ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('discount_coupons.discount_percent')</label>
    <input type="number" name="discount_percent" class="form-control" value="{{ old('discount_percent', $discountCoupon->discount_percent ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('discount_coupons.max_usage')</label>
    <input type="number" name="max_usage" class="form-control" value="{{ old('max_usage', $discountCoupon->max_usage ?? '') }}">
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
