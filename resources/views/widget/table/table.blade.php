<?php
$__headers = [];
foreach($table->columns->all() as $column) $__headers[] = $column->render();
$__headers = implode('', $__headers);
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            {!! $__headers !!}
        </tr>
    </thead>
    <tbody>
    @foreach($table->items as $item)
        <tr>
        @foreach($table->columns->all() as $column)
            {!! $column->renderColumn($item) !!}
        @endforeach
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        @if(isset($table->footer))
            <tr>
                <td colspan="{{ $table->columns->count() }}">
                    {!! $table->footer !!}
                </td>
            </tr>
        @else
            <tr>
                {!! $__headers !!}
            </tr>
        @endif
    </tfoot>
</table>