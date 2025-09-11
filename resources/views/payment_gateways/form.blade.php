@csrf
<div class="mb-3">
    <label class="form-label">@lang('payment_gateways.company')</label>
    <select name="company_id" class="form-select">
        <option value="">@lang('payment_gateways.global')</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" @selected(old('company_id', $paymentGateway->company_id ?? '') == $company->id)>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('payment_gateways.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $paymentGateway->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('payment_gateways.provider')</label>
    <input type="text" name="provider" class="form-control" value="{{ old('provider', $paymentGateway->provider ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('payment_gateways.config')</label>
    <textarea name="config" class="form-control" rows="4" required>{{ old('config', isset($paymentGateway) ? json_encode($paymentGateway->config, JSON_PRETTY_PRINT) : '') }}</textarea>
    <small class="text-muted">@lang('payment_gateways.config_hint')</small>
</div>
<div class="form-check mb-3">
    <input type="checkbox" name="is_default" class="form-check-input" value="1" @checked(old('is_default', $paymentGateway->is_default ?? false))>
    <label class="form-check-label">@lang('payment_gateways.default')</label>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
