<input type="checkbox" class="{{ $uid }}_head" />
<script>
    jQuery(function() {
        jQuery('input[type=checkbox].{{ $uid }}_head').change(function() {
            jQuery('input[type=checkbox].{{ $uid }}').prop('checked', jQuery(this).prop('checked'));
        });
    })
</script>