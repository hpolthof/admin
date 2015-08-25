<textarea
        id="{{ $id }}"
        name="{{ $field->getName() }}"
        type="text"
        {!! $field->getReadonlyHtml() !!}
        {!! $field->getRequiredHtml() !!}
        placeholder="{{ $field->getTitle() }}"
        rows="{{ $field->getRows() }}"
        class="form-control">{{ $field->getValue() }}</textarea>