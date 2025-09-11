@csrf
<div class="mb-3">
    <label class="form-label">@lang('attendants.booth')</label>
    <select name="booth_id" class="form-select" required>
        <option value="">@lang('attendants.select_booth')</option>
        @foreach($booths as $booth)
            <option value="{{ $booth->id }}" @selected(old('booth_id', $attendant->booth_id ?? '') == $booth->id)>
                {{ $booth->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">@lang('attendants.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $attendant->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('attendants.email')</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $attendant->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('attendants.password')</label>
    <input type="password" name="password" class="form-control" @if(!isset($attendant)) required @endif>
</div>
<div class="mb-3">
    <label class="form-label">@lang('attendants.password_confirm')</label>
    <input type="password" name="password_confirmation" class="form-control" @if(!isset($attendant)) required @endif>
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
