@csrf
<div class="mb-3">
    <label class="form-label">@lang('clients.name')</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $client->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">@lang('clients.document')</label>
    <input type="text" name="document" class="form-control" value="{{ old('document', $client->document ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('clients.email')</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $client->email ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">@lang('clients.phone')</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $client->phone ?? '') }}">
</div>
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none"></span>
    @lang('actions.save')
</button>
