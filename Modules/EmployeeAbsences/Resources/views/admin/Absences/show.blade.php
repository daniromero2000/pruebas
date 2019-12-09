@extends('layouts.admin.app')
@section('content')
@php
@endphp
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span
                        class="divider"></span>
                </li>
                <li><a href="{{ route('admin.absences.index') }}">Sucursales</a><span class="divider"></span>
                    {{-- <li class="breadactive">{{$subsidiary->name}}</li> --}}
            </ol>
        </div>
    </div>
    {{-- @if($subsidiary)  --}}
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            {{-- <h2>{{ $subsidiary->name }} {{ $subsidiary->city->name }}</h2> --}}
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Empleado</th>
                        <th class="text-center" scope="col">Departamento</th>
                        {{-- <th class="text-center" scope="col">Sucursal</th> --}}
                        <th class="text-center" scope="col">Tiempo Solicitado</th>
                        <th class="text-center" scope="col">Estado</th>
                        <th class="text-center" scope="col">Motivo</th>
                        <th class="text-center" scope="col">Justificacion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{ $absence->employee->name }}</td>
                        @foreach ($absence->employee->department as $depar)
                        <td class="text-center">{{ $depar->name }}</td>
                        {{-- <td class="text-center">{{ $depar->subsidiary->name }}</td> --}}
                        @endforeach
                        {{-- <td class="text-center">{{ $subsidiary->phone }}</td>--}}
                        <td class="text-center">@php
                            echo $absence->start_date->longAbsoluteDiffForHumans($absence->finish_date).' H';
                            @endphp
                        </td>
                        <td class="text-center">
                            <button class="btn bg-green">
                                <i class="fa fa-check" style="color: #ffffff"></i>
                            </button>
                        </td>
                        <td class="text-center">{{ $absence->employee->name }}</td>
                        <td class="text-center">{{ $absence->employee->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            <div class="btn-group">
                <a href="{{ route('admin.absences.index') }}" class="btn btn-default btn-sm">Regresar</a>
            </div>
        </div>
    </div>

    {{-- @endif --}}

</section>

@endsection
