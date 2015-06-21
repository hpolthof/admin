<div class="small-box bg-{{ $color or \Config::get('admin.layout.skin') }}">
    <div class="inner">
        <h3>{{ $value }}</h3>
        <p>{{ $name }}</p>
    </div>
    <div class="icon">
        @if(substr($icon, 0, 4) == 'ion-')
            <i class="ion {{ $icon }}"></i>
        @elseif(substr($icon, 0, 3) == 'fa-')
            <i class="fa {{ $icon }}"></i>
        @else
            <i class="{{ $icon }}"></i>
        @endif
    </div>
    <a href="{{ $url }}" class="small-box-footer">{{ $label or 'More...' }} <i class="fa fa-arrow-circle-right"></i></a>
</div>
