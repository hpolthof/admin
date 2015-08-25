<div class="form-group">
    @if($field->isVertical())
        <label class="control-label" for="field_{{ $uid }}">{{ $field->getTitle() }} {{ ($field->isRequired()?'*':'') }}</label>
        {!! $field->renderField('field_'.$uid) !!}
    @else
        <label class="control-label col-sm-3" for="field_{{ $uid }}">{{ $field->getTitle() }} {{ ($field->isRequired()?'*':'') }}</label>
        <div class="col-sm-9">{!! $field->renderField('field_'.$uid) !!}</div>
    @endif
</div>