@extends('layouts.admin.app')
@section('content')

<section class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span
                        class="divider"></span>
                </li>
                <li><a href="{{ route('admin.roles.index') }}">Roles</a><span class="divider"></span>
            </ol>
        </div>
    </div>
    @if(!$roles->isEmpty())
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1> {{$roles->count()}} Roles Empleados</h1>
            <div class="row">
                <div class="col-md-5">
                    @include('layouts.search', ['route' => route('admin.roles.index')])
                </div>
                <div class="col-md-5 float-right">
                    @include('layouts.admin.trashed-list', ['route' => route('admin.roles.index')])
                </div>
            </div>
            @include('layouts.admin.tables.base_tables', [$headers, 'datas' => $roles ])
            @include('layouts.admin.pagination.pagination', [$skip])
        </div>
    </div>
    @else
    @include('layouts.admin.pagination.pagination_null', [$skip, $optionsRoutes])
    @endif
</section>
@endsection