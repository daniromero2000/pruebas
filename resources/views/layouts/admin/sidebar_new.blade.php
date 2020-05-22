@php
$permissions = session('permission');
@endphp
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"> <img src="{{ asset('img/avatarsocomir.png') }}" class="img-circle"
                    alt="User Image"></div>
            <div class="pull-left info">
                <p>{{ $user->name }} {{ $user->last_name }}</p> <a href="#"><i class="fa fa-circle text-success"> </i>
                    Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            @foreach ($permissions as $group => $value)
            <li class="header">{{ $group }}</li>
            @foreach($permissions[$group] as $key => $module )
            <li class="treeview @if(request()->segment(2) == $module['name']) active @endif">
                <a href="#">
                    <i class="{{$module['icon']}}" aria-hidden="true"></i>
                    <span> {{$module['display_name']}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach ($module['actionsPrincipal'] as $action)
                    <li>
                        <a href={{route('admin.redirectAction', [$action['id']])}}>
                            <i class="{{$action['icon']}}" aria-hidden="true"></i> {{$action['name']}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            @endforeach
        </ul>
    </section>
</aside>