<select
        id="{{ $id }}"
        name="{{ $field->getName() }}"
        {!! $field->getRequiredHtml() !!}
        {!! $field->getReadonlyHtml() !!}
        class="form-control">
    @if($field->isEmptyStart())
        <option></option>
    @endif
    @foreach($field->getOptions() as $value => $option)
        @if(is_string($value) && is_array($option))
            <optgroup label="{{ $value }}">
                @foreach($option as $v => $o)
                    <option value="{{ $v }}" {{ ($field->getValue() == $v)?'SELECTED':'' }}>{{ $o }}</option>
                @endforeach
            </optgroup>
        @else
            <option value="{{ $value }}" {{ ($field->getValue() == $value)?'SELECTED':'' }}>{{ $option }}</option>
        @endif
    @endforeach
</select>