<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $title or '' }}
        <small>{{ $subtitle or '' }}</small>
    </h1>
    @if($controller->hasBreadcrumbs())
        @include('admin::layout.partials.breadcrumbs')
    @endif
</section>
