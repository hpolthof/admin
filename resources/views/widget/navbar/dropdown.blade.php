<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {!! $caption !!}
    </a>
    <ul class="dropdown-menu">
        @if(strlen($header) > 0)
        <li class="header">
            {!! $header !!}
        </li>
        @endif

        <li>
            {!! $content !!}
        </li>

        @if(strlen($footer) > 0)
        <li class="footer">
            {!! $footer !!}
        </li>
        @endif
    </ul>
</li>