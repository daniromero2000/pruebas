@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')

<section class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span
                        class="divider"></span>
                </li>
            </ol>
        </div>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-header with-border">
            <h1 class="box-title"><strong>Panel Administrativo</strong></h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus">
                        <!-- --></i><!-- --></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fa fa-times">
                        <!-- --></i><!-- --></button>
            </div>
        </div>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-header with-border">
            <h1 class="box-title"><strong>Panel Administrativo</strong></h1>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus">
                        <!-- --></i><!-- --></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fa fa-times">
                        <!-- --></i><!-- --></button>
            </div>
            <div class="row">
                <div class="col">
                    @foreach ($permissions as $key => $module)
                    @foreach ($module['actionsPrincipal'] as $action)
                    <a class="btn btn-app" href={{route('admin.redirectAction', [$action['id']]) }}>
                        <i class="{{ $action['icon'] }}"></i> {{ $action['name'] }}
                    </a>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">

</section>

@endsection