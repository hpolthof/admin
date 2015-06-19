<td>
    @if($column->isRaw())
        {!! $column->getColumnContent($item) !!}
    @else
        {{ $column->getColumnContent($item) }}
    @endif
</td>