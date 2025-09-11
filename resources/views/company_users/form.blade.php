@csrf
<div class="mb-3">
    <label class="form-label">@lang('company_users.company')</label>
    <select name="company_id" class="form-select" required>
        <option value="">@lang('company_users.select_company')</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" @selected(old('company_id', $companyUser->company_id ?? '') == $company->id)>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('company_users.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $companyUser->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('company_users.email')</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $companyUser->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('company_users.password')</label>
    <input type="password" name="password" class="form-control" @if(!isset($companyUser)) required @endif>
</div>
<div class="mb-3">
    <label class="form-label">@lang('company_users.password_confirm')</label>
    <input type="password" name="password_confirmation" class="form-control" @if(!isset($companyUser)) required @endif>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
