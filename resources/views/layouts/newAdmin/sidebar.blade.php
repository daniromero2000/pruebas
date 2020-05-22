@php
$permissions = session('permission');
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link d-flex justify-content-center">
        <div> <img src="{{asset('img/lagobo_logo.png')}}" alt="Oportudata" class="brand-image levation-3  mb-1"
                style=" opacity: .8; margin-left: 0px "> </div> <br>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/avatarsocomir.png') }}">
            </div>
            <div class=" info">
                <a class="d-block"><br> <i class="fa fa-circle text-success">
                    </i>
                    Online</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($permissions as $group => $value)
                <li class="nav-item has-treeview">
                    <a class="nav-link">
                        <i class="right fas fa-angle-left"></i>
                        <p> {{ $group }} </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach($permissions[$group] as $key => $module )
                        <li class="nav-item has-treeview">
                            <a class="nav-link  @if(request()->segment(2) == $module['name']) active @endif">
                                <i class="nav-icon {{$module['icon']}}" aria-hidden="true"></i>
                                <p>
                                    {{$module['display_name']}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($module['actionsPrincipal'] as $action)
                                <li class="nav-item">
                                    <a class="nav-link" href={{route('admin.redirectAction', [$action['id']])}}>
                                        <i class="nav-icon {{$action['icon']}}" aria-hidden="true"></i>
                                        {{$action['name']}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>