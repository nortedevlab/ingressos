@csrf
<div class="mb-3">
    <label class="form-label">@lang('service_fees.company')</label>
    <select name="company_id" class="form-select">
        <option value="">@lang('service_fees.none')</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" @selected(old('company_id', $serviceFee->company_id ?? '') == $company->id)>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('service_fees.event')</label>
    <select name="event_id" class="form-select">
        <option value="">@lang('service_fees.none')</option>
        @foreach($events as $event)
            <option value="{{ $event->id }}" @selected(old('event_id', $serviceFee->event_id ?? '') == $event->id)>
                {{ $event->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('service_fees.batch')</label>
    <select name="batch_id" class="form-select">
        <option value="">@lang('service_fees.none')</option>
        @foreach($batches as $batch)
            <option value="{{ $batch->id }}" @selected(old('batch_id', $serviceFee->batch_id ?? '') == $batch->id)>
                {{ $batch->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('service_fees.fee_percent')</label>
    <input type="number" step="0.01" name="fee_percent" class="form-control" value="{{ old('fee_percent', $serviceFee->fee_percent ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('service_fees.fee_value')</label>
    <input type="number" step="0.01" name="fee_value" class="form-control" value="{{ old('fee_value', $serviceFee->fee_value ?? '') }}">
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
