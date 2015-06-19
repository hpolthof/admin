<table class="table table-hover">
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
    </tbody>
    @endforeach
    <tfoot>
        <tr>
        @foreach($table->columns->all() as $column)
            {!! $column->render() !!}
        @endforeach
        </tr>
    </tfoot>
</table>