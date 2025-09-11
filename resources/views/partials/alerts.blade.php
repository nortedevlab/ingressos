@if(session('success'))
    <div class="alert alert-success">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle"></i> @lang('messages.form_error')
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
