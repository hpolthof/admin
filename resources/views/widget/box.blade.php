<div class="box {{ $box->class }} {{ ($box->isCollapsible() && $box->isCollapsed()) ? 'collapsed-box' : '' }}">
    @if(isset($box->title) || isset($box->header))
    <div class="box-header with-border">
        @if(isset($box->header))
            {!! $box->header !!}
        @endif
        @if(isset($box->title))
            <h3 class="box-title">{{ $box->title  }}</h3>
        @endif

        <div class="box-tools pull-right">
            @if(isset($box->tools))
            {!! $box->tools !!}
            @endif

            @if($box->isCollapsible())
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-{{ $box->isCollapsed() ? 'plus' : 'minus' }}"></i></button>
            @endif

            @if($box->isRemovable())
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            @endif
        </div>

    </div><!-- /.box-header -->
    @endif

    <div class="box-body">
        {!! $box->body !!}
    </div><!-- /.box-body -->

    @if(isset($box->footer))
    <div class="box-footer clearfix">
        {!! $box->footer !!}
    </div>
    @endif
</div>