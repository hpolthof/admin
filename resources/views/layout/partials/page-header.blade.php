<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $title or 'Title' }}
        <small>{{ $subtitle or 'Subtitle' }}</small>
    </h1>
    @include('admin::layout.partials.breadcrumbs')
</section>
