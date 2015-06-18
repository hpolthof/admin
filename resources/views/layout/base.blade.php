<?php
    $assetPath = '/hpolthof/admin';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ \Config::get('title') }}</title>
    @include('admin::layout._meta')
    @include('admin::layout._style')
    @include('admin::layout._scriptsTop')
</head>
<body class="skin-{{ \Config::get('admin.layout.skin') }} {{ \Config::get('admin.layout.options') }}">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        @include('admin::layout.partials.logo')
        @include('admin::layout.partials.navbar.navbar')
    </header>

    @include('admin::layout.partials.sidebar.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin::layout.partials.page-header')
        <!-- Main content -->
        <section class="content">
            {!! $content or 'Please set content' !!}
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('admin::layout.partials.footer')

    @include('admin::layout.partials.rightbar.rightbar')
</div><!-- ./wrapper -->

    @include('admin::layout._scripts');
</body>
</html>
