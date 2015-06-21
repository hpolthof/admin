<ol class="breadcrumb">
    @foreach($controller->getBreadcrumbs()->all() as $link)
        <li>
            {!! $link->render() !!}
        </li>
    @endforeach
</ol>