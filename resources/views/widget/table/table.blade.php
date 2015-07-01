<?php
$__headers = [];
foreach($table->columns->all() as $column) {
    if($column->getField() !== $table->getGroupBy() || $column->getField() === null) {
        $__headers[] = $column->render();
    }
}
$__headers = implode('', $__headers);
?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            {!! $__headers !!}
        </tr>
    </thead>
    @if(count($table->getGroups()) > 0)
        @foreach($table->getGroups() as $group)
            <tbody>
            <tr class="info">
                <td colspan="{{ $table->columns->count() }}" style="font-style: italic">{{ $group }}</td>
            </tr>
            @foreach($table->items as $item)
                @if($item->{$table->getGroupBy()} === $group)
                <tr>
                    @foreach($table->columns->all() as $column)
                        @if($column->getField() !== $table->getGroupBy())
                            {!! $column->renderColumn($item) !!}
                        @endif
                    @endforeach
                </tr>
                @endif
            @endforeach
            </tbody>
        @endforeach
    @else
        <tbody>
        @foreach($table->items as $item)
            <tr>
            @foreach($table->columns->all() as $column)
                {!! $column->renderColumn($item) !!}
            @endforeach
            </tr>
        @endforeach
        </tbody>
    @endif
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