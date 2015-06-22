<?php
$exclude = $column->getData('exclude');
?>


<div class="btn-group btn-group-sm pull-right">
    @foreach($column->getData('table')->getButtons()->all() as $button)
        {!! $button->setData(['id' => $item->id])->render() !!}
    @endforeach

    @if(!$exclude->contains('show'))
        <a class="btn btn-default" href="{{ URL::action('\\'.$column->getData('controller').'@show', $item->id) }}"><i class="fa fa-eye"></i></a>
    @endif

    @if(!$exclude->contains('edit'))
        <a class="btn btn-default" href="{{ URL::action('\\'.$column->getData('controller').'@edit', $item->id) }}"><i class="fa fa-pencil"></i></a>
    @endif

    @if(!$exclude->contains('destroy'))
        <a class="btn btn-danger" href="{{ URL::action('\\'.$column->getData('controller').'@destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
    @endif
</div>

<div class="pull-right" style="margin-right:5px">
    @foreach($column->getData('extra')->all() as $view)
        @include($view)
    @endforeach
</div>