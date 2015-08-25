<input
        id="{{ $id }}"
        name="{{ $field->getName() }}"
        value="{{ $field->getValue() }}"
        type="{{ $type }}"
        {!! $field->getReadonlyHtml() !!}
        {!! $field->getRequiredHtml() !!}
        placeholder="{{ $field->getTitle() }}"
        class="form-control">