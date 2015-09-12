@extends('admin::auth.base')

@section('content')
    <p class="login-box-msg">{{ trans('admin.auth.intro') }}</p>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="{{ trans('admin.auth.email') }}" value="{{ old('email') }}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="{{ trans('admin.auth.password') }}" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" /> {{ trans('admin.auth.remember_me') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('admin.auth.signin') }}</button>
            </div><!-- /.col -->
        </div>
    </form>

    <a href="{{ url('/password/email') }}">{{ trans('admin.auth.forgot') }}</a><br>
@stop