<?php
    $assetPath = '/hpolthof/admin';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ \Config::get('title') }}</title>
    @include('admin::layout._meta')
    @include('admin::layout._style')
    @include('admin::layout._scriptsTop')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
