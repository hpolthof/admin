<select
        id="{{ $id }}"
        name="{{ $field->getName() }}"
        value="{{ $field->getValue() }}"
        {!! $field->getRequiredHtml() !!}
        {!! $field->getReadonlyHtml() !!}
        class="form-control">
    @if($field->isEmptyStart())
        <option></option>
    @endif
    @foreach($field->getOptions() as $value => $option)
        <option value="{{ $value }}" {{ ($field->getValue() === $value)?'SELECTED':'' }}>{{ $option }}</option>
    @endforeach
</select>