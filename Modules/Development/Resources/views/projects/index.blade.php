@extends('layouts.admin.app')
@section('content')
<section class="content" class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span
                        class="divider"></span>
                </li>
                <li><a href="{{ route('admin.projects.index') }}">Proyectos</a><span class="divider"></span>
                <li class="breadactive">
                </li>
            </ol>
        </div>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="globalsearch">
                            @include('development::nav.global.search')
                        </div>
                        <h2>Proyectos</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row fluid-container main-content">
                            @if($projects->isNotEmpty())
                            <div class="fluid-container col-sm-10">
                                @foreach(array_chunk($projects->all(),3) as $row)
                                <div class="row">
                                    @foreach($row as $project)
                                    <div class="col-sm-4">
                                        @include('development::projects.list.project-card', [$issueStatuses])
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                            @else
                            <h2>No se encontraron Proyectos</h2>
                            <h3><a href="{{ route('admin.projects.create')}}">Crea tu primer Proyecto</a></h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection