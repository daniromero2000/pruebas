@extends('layouts.admin.app')
@extends('development::grubber')
@section('content')
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span
                        class="divider"></span>
                </li>
                <li><a href="{{ route('admin.projects.index') }}">Proyectos</a><span class="divider"></span>
                <li class="breadactive"><i class="fa fa-user" aria-hidden="true"></i> {{$project->name}}
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
                <div class="box-body">
                    <div class="panel-body">
                        @if($project)
                        <div class="container-fluid">
                            <h2 data-id="{{$project->id}}" id="project-name" class="project-title">
                                Planificación {{$project->name}}
                            </h2>
                            @if( $project->deadline)
                            <span>Fecha Límite {{ $project->deadline->diffForHumans()}}</span>
                            @endif
                            <div class="actions">
                                <div class="col-md-5">
                                    <h5 class="group-heading">Navegar</h5>
                                    <a href=" {{ route('admin.projects.show', [$project->id])}}"
                                        class="btn btn-default">
                                        Modo Trabajo
                                    </a>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class=" col-md-4">
                                    <h5 class="group-heading">Opciones</h5>
                                    <div class="btn-group" role="group">
                                        <button id="action-add-issue" type="button" class="btn btn-default">
                                            Agregar Issue
                                        </button>
                                        <button id="action-add-sprint" type="button" class="btn btn-default">
                                            Agregar Sprint
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" id="action-add-sprint-body">
                                <div class="col-md-8">
                                    @include('development::projects.plan.sprints-add-form')
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12" id="action-add-issue-body">
                                <div class="col-md-8">
                                    @include('development::projects.plan.issue-add-form')
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 project-plan main-content">
                            <div class="container-fluid col-md-10">
                                @foreach(Modules\Development\Entities\Projects\Project::find($project->id)->getSprints()
                                as
                                $sprint)
                                <div class="row sprint-header" data-machine-name="{{$sprint->machine_name}}">
                                    <div class="col-md-4">
                                        <h3 class="sprint-name" data-machine-name="{{$sprint->machine_name}}">
                                            {{$sprint->name}}
                                            <span class="grey issue-count">
                                                ({{Modules\Development\Entities\Utils::getIssueCountInSprint($sprint->id)}})
                                            </span>
                                            @if($sprint->status_id ==
                                            Modules\Development\Entities\SprintStatus::getIdByMachineName('active'))
                                            <span class="badge">Active Sprint</span>
                                            @endif
                                        </h3>

                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4 date-range">
                                        @if($sprint->from_date && $sprint->to_date &&
                                        $sprint->machine_name != 'backlog' && $sprint->status_id)
                                        <div class="col-md-6">
                                            <span><strong>Desde </strong></span>
                                            {{ $sprint->from_date->format('M d, Y h:i a')}}
                                        </div>
                                        <div class="col-md-6">
                                            <span><strong>Hasta </strong></span>
                                            {{ $sprint->to_date->format('M d, Y h:i a')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @if($sprint->machine_name != 'backlog' && $sprint->status_id !=
                                Modules\Development\Entities\SprintStatus::getIdByMachineName('active'))
                                <button data-status="0" data-id="{{$sprint->machine_name}}"
                                    class="btn btn-default btn-sm sprint-activate" type="submit">Activar
                                </button>
                                @include('development::projects.plan.sprint-activate-form')
                                @endif
                                @if($sprint->status_id ==
                                Modules\Development\Entities\SprintStatus::getIdByMachineName('active'))
                                <button data-status="0" data-id="{{$sprint->machine_name}}"
                                    data-project-id="{{$project->id}}" class="btn btn-default btn-sm sprint-complete"
                                    type="submit">Completar
                                </button>
                                @endif
                                @include('development::projects.plan.issues-in-sprint')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
