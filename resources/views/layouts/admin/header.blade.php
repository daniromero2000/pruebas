@section('adminlte_css')
<link rel="stylesheet"
    href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}}">
@stack('css')
@yield('css')
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
'boxed' => 'layout-boxed',
'fixed' => 'fixed',
'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

<header class="main-header"> <a href="{{route('admin.dashboard')}}" class="logo"> <span class="logo-mini"><img
                src="{{asset('/img/lagobo_logo.png')}}" alt="Model" width="70"></span> <span class="logo-lg"><img
                src="{{asset('/img/lagobo_logo.png')}}" alt="Model" width="170"></span>
    </a>
    <nav class="navbar navbar-static-top"> <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img
                            src="{{ asset('img/avatarsocomir.png') }}" class="user-image" alt="User Image"> <span
                            class="hidden-xs">{{ $user->name }}</span> </a>
                    <ul class="dropdown-menu">
                        <li class="user-header"> <img src="{{ asset('img/avatarsocomir.png') }}" class="img-circle"
                                alt="User Image">
                            <p> {{ $user->name }} <small>Miembro desde
                                    {{ date('m Y', strtotime($user->created_at)) }}</small></p>
                        </li>
                        <li class="user-body"></li>
                        <li class="user-footer">
                            <div class="pull-left"> <a href="{{ route('admin.employee.profile', $user->id) }}"
                                    class="btn btn-default btn-flat">Perfil</a></div>
                            <div class="pull-right"> <a href="{{ route('admin.logout') }}"
                                    class="btn btn-default btn-flat">Salir</a></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>