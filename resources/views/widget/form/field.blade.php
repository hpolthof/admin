<div class="form-group {{ count($field->getErrors()) > 0 ? 'has-error' : '' }}">
    @if($field->isVertical())
        <label class="control-label" for="field_{{ $uid }}">{{ $field->getTitle() }} {{ ($field->isRequired()?'*':'') }}</label>
        {!! $field->renderField('field_'.$uid) !!}
        @if(count($field->getErrors()) > 0)
            <p class="help-block">{{ $field->getErrors()[0] }}</p>
        @endif
    @else
        <label class="control-label col-sm-3" for="field_{{ $uid }}">{{ $field->getTitle() }} {{ ($field->isRequired()?'*':'') }}</label>
        <div class="col-sm-9">
            {!! $field->renderField('field_'.$uid) !!}
            @if(count($field->getErrors()) > 0)
                <p class="help-block">{{ $field->getErrors()[0] }}</p>
            @endif
        </div>
    @endif
</div>