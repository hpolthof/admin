<input
        id="{{ $id }}"
        name="{{ $field->getName() }}"
        value="{{ $field->getValue() }}"
        type="{{ $type }}"
        {!! $field->getReadonlyHtml() !!}
        {!! $field->getRequiredHtml() !!}
        placeholder="{{ $field->getTitle() }}"
        data-provide="datepicker-inline"
        class="form-control">

<script>
    $(function() {
       $('#{{ $id }}').datepicker({
           todayHighlight: true,
           language: '{{ \Lang::locale() }}',
           format: '{{ $field->getFormat() }}',
           autoclose: true
       });
    });
</script>
