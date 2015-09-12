<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ \Config::get('admin.title') }}</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/hpolthof/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hpolthof/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/hpolthof/admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/hpolthof/admin/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        {!! \Config::get('admin.logo.large') !!}
    </div><!-- /.login-logo -->

    @if(\Session::has('status'))
        <div class="login-box-body bg-blue">
            {{ \Session::get('status') }}
        </div>
    @endif

    <div class="login-box-body">
        @yield('content')
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<script src="/hpolthof/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/hpolthof/admin/js/bootstrap.min.js"></script>
<script src="/hpolthof/admin/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
