<div class="box">
    @if(isset($box->title) || isset($box->header))
    <div class="box-header with-border">
        @if(isset($box->header))
            {!! $box->header !!}
        @endif
        @if(isset($box->title))
            <h3 class="box-title">{{ $box->title  }}</h3>
        @endif
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