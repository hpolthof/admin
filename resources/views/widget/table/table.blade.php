<table class="table table-hover table-striped">
    <thead>
        <tr>
        @foreach($table->columns->all() as $column)
            {!! $column->render() !!}
        @endforeach
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
        <tr>
        @foreach($table->columns->all() as $column)
            {!! $column->render() !!}
        @endforeach
        </tr>
    </tfoot>
</table>