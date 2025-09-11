```bladehtml
<button type="submit" class="btn btn-primary btn-submit">
    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
    @lang('actions.save')
</button>

<script>
document.querySelectorAll('.btn-submit').forEach(btn => {
    btn.closest('form').addEventListener('submit', () => {
        btn.disabled = true;
        btn.querySelector('.spinner-border').classList.remove('d-none');
    });
});
</script>
```
