@php
$fechaActual = strtotime(date("Y-m-d"));
$fechaMayorEdad = date("Y-m-d", strtotime("-18 years", $fechaActual));
@endphp
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
                <li><a href="{{ route('admin.employees.index') }}">Empleados</a><span class="divider"></span>
                <li class="breadactive"><i class="fa fa-user" aria-hidden="true"></i> {{$employee->name}}
                    {{$employee->last_name}}</li>
            </ol>
        </div>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <ul class="nav nav-tabs" role="tablist" id="tablist">
            <li role="presentation" @if(!request()->has('info')) class="active" @endif><a href="#info"
                    aria-controls="home" role="tab" data-toggle="tab">Empleado</a></li>
            <li role="presentation" @if(request()->has('contact')) class="active" @endif><a href="#contact"
                    aria-controls="profile" role="tab" data-toggle="tab">Contacto</a></li>
            <li role="presentation" @if(request()->has('seguimiento')) class="active" @endif><a href="#seguimiento"
                    aria-controls="profile" role="tab" data-toggle="tab">Seguimiento</a></li>
        </ul>
        <div class="tab-content" id="tabcontent">
            <div role="tabpanel" class="tab-pane active" id="info">
                @include('companies::layouts.generals')
                @include('companies::layouts.ids')
                <div class="row">
                    @include('companies::layouts.epss')
                    @include('companies::layouts.professions')
                </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="contact">
                <div class="row">
                    @include('companies::layouts.addresses')
                    @include('companies::layouts.phones')
                    @include('companies::layouts.emails')
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="seguimiento">
                <div class="row">
                    @include('layouts.admin.commentaries', ['datas' => $employee->employeeCommentaries])
                    @include('companies::layouts.statusesLog', ['datas' => $employee->employeeStatusesLogs])
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('admin.employees.index') }}" class="btn btn-default btn-sm">Regresar</a>
        </div>
        @include('companies::layouts.add_address_modal')
        @include('companies::layouts.add_email_modal')
        @include('companies::layouts.add_phone_modal')
        @include('companies::layouts.add_identity_modal')
        @include('companies::layouts.add_comment_modal')
        @include('companies::layouts.add_eps_modal')
        @include('companies::layouts.add_profession_modal')
    </div>
</section>
@endsection