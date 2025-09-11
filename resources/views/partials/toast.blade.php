<div class="toast-container position-fixed top-0 end-0 p-3">
    @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="toast align-items-center text-bg-danger border-0 show">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-exclamation-triangle"></i> @lang('messages.form_error')
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif
</div>
