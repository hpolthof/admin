<a class="btn btn-default btn-sm" href="{{ URL::action('\\'.$controller.'@create') }}"><i class="fa fa-plus"></i></a>
<div class="btn-group">
    @if(!$exclude->contains('destroy'))
    <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
    @endif
</div>