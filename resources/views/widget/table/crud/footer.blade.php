@if(method_exists('\\'.$controller, 'create'))
<a class="btn btn-default btn-sm" href="{{ URL::action('\\'.$controller.'@create', $link_parameters) }}"><i class="fa fa-plus"></i></a>
@endif
<div class="btn-group">
    @if(!$exclude->contains('destroy'))
    <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
    @endif
</div>