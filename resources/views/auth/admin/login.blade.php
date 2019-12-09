<!DOCTYPE html>
<html lang="es">
@section('adminlte_css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
@yield('css')
@stop

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="subject" content="">
    <meta name="copyright" content="">
    <meta name="language" content="ES">
    <meta name="classification" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/auth/login-register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap3.min.css') }}">
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- Normalize MIT -->
    <link href="{{ asset('css/normalizeMIT.min.css') }}" rel="stylesheet">
    <link href="http://www.Model.org/" rel="canonical" />
</head>

<body class="hold-transition login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="login-box">
                    <div class="login-logo"> <img src="{{asset('/img/lagobo_logo.png')}}"
                            class="img-responsive center-block" alt="Lagobo" width="190" title="Lagobo"></div>
                    @include('layouts.errors-and-messages')<div class="login-box-body">
                        <h1 class="login-box-msg">Inicia Sesión</h1>
                        <form action="{{ route('admin.login') }}" method="post">@csrf
                            <div class="form-group has-feedback">
                                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="{{ trans('adminlte::adminlte.email') }}" required>
                                    <span class="fa fa-user-circle form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" name="password" class="form-control"
                                    placeholder="{{ trans('adminlte::adminlte.password') }}" required>
                                <span class="fa fa-key form-control-feedback"></span>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="checkbox icheck text-center">
                                        <label>
                                            <input type="checkbox" name="remember">
                                            {{ trans('adminlte::adminlte.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="auth-links text-right">
                                        <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                                            class="text-center">{{ trans('adminlte::adminlte.i_forgot_my_password') }}</a>
                                    </div>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> <button
                                        type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
    @stop

</body>

</html>
