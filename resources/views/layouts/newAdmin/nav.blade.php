<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <nav class="navbar navbar-static-top"> <a href="#" class="sidebar-toggle" data-toggle="push-menu"
                    role="button">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                    <span class="icon-bar"></span> </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img
                                    src="{{ asset('img/avatarsocomir.png') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs"></span> </a>
                            <ul class="dropdown-menu">
                                <li class="user-header"> <img src="{{ asset('img/avatarsocomir.png') }}"
                                        class="img-circle" alt="User Image">
                                    <p> <small>Miembro desde
                                        </small></p>
                                </li>
                                <li class="user-body"></li>
                                <li class="user-footer">
                                    <div class="pull-left"> <a href="{{ route('admin.employee.profile', 1) }}"
                                            class="btn btn-default btn-flat">Perfil</a></div>
                                    <div class="pull-right"> <a href="{{ route('admin.logout') }}"
                                            class="btn btn-default btn-flat">Salir</a></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

{{-- {{ $user->name }} {{ date('m Y', strtotime($user->created_at)) }} --}}