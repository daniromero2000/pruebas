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
                <li><a href="{{ route('admin.projects.index') }}">Proyectos</a><span class="divider"></span>

            </ol>
        </div>
    </div>
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>Crear Proyecto</h2>
                {!! Form::model($project = new Modules\Development\Entities\Projects\Project, ['route' =>
                'admin.projects.store']) !!}
                @csrf
                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('deadline', 'Fecha Límite:') !!}
                    {!! Form::input('date', 'deadline', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Crear Proyecto', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>
@endsection