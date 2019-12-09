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
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
        @if($project)
        @include('development::projects.show.header')
        <div class="row container-fluid project-work main-content">
            @if($project->activeSprints)
            @if(count($issues) > 0)
            @foreach($issueStatuses as $issueStatus)
            <div class="col-sm-4">
                <?php $list = Modules\Development\Entities\Utils::getIssuesInSprintByIssueStatus($issueStatus->machine_name,$sprint->id) ?>
                <h3 data-status-heading="{{$issueStatus->machine_name}}">{{$issueStatus->label}}
                    <span class="grey issue-count">({{$list->count()}})</span>
                </h3>
                @include('development::projects.show.issues-list')
            </div>
            @endforeach
            @endif
            @else
            <p>No hay Sprints Activos en este Proyecto</p>
            @endif
            @else
            <h3>No se encontraton Asuntos</h3>
            <p><a href=" {{ route('admin.issues.create') }}">Crear un nuevo asunto</a></p>
            @endif
        </div>
    </div>
    </div>
</section>
@endsection
@include('development::projects.show.js')