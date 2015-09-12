@extends('admin::auth.base')

@section('content')
    <p class="login-box-msg">{{ trans('admin.password.intro') }}</p>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form role="form" method="POST" action="{{ action($ctrl_name.'@postEmail') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="{{ trans('admin.auth.email') }}" value="{{ old('email') }}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('admin.password.reset') }}</button>
    </form>
@stop