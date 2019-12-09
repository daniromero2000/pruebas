@extends('layouts.admin.app')
@extends('development::grubber')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Create an issue</h2>
                </div>
                <div class="panel-body">
                    <div class="row fluid-container main-content">
                        <div class="container-fluid col-md-10">
                            {!! Form::model($issue = new Modules\Development\Entities\Issues\Issue, ['route' =>
                            'admin.issues.store']) !!}
                            <div class="form-group">
                                @csrf
                                {!! Form::label('title', 'Título:') !!}
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Descripción:') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>

                            <div id="project_id" class="form-group">
                                <label for="project_id">Proyecto<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <select name="project_id" id="project_id" class="form-control" enabled>
                                        @foreach($projectNames as $projectName)
                                        <option value="{{ $projectName->id }}">{{ $projectName->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="type_id" class="form-group">
                                <label for="type_id">Tipo de Issue<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <select name="type_id" id="type_id" class="form-control" enabled>
                                        @foreach($issueTypeLabels as $issueTypeLabel)
                                        <option value="{{ $issueTypeLabel->id }}">{{ $issueTypeLabel->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('deadline', 'Fecha Límite:') !!}
                                {!! Form::input('date', 'deadline', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Crear sIssue', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                        @include('development::errors.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop