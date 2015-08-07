<li class="treeview {{ $active ? 'active' : '' }}">
    <a href="{{ $url !== null ? $url : '#' }}">
        <i class='fa {{ $icon }}'></i>


        <span>
            {{ $title }}
            @if($indicator !== null)
                <span class="badge pull-right" style="margin-right: 28px">{{ $indicator }}</span>
            @endif
        </span>

        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        @foreach($items->all() as $item)
            {!! $item->render() !!}
        @endforeach
    </ul>
</li>