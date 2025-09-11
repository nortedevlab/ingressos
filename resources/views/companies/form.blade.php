@csrf
<div class="mb-3">
    <label class="form-label">@lang('companies.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $company->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('companies.document')</label>
    <input type="text" name="document" class="form-control" value="{{ old('document', $company->document ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('companies.email')</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $company->email ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('companies.phone')</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $company->phone ?? '') }}">
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
