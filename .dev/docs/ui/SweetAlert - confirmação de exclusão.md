```bladehtml
<form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline delete-form">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="bi bi-trash"></i> @lang('actions.delete')
    </button>
</form>

<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '@lang("messages.confirm_delete")',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '@lang("actions.confirm")',
            cancelButtonText: '@lang("actions.cancel")',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
```
