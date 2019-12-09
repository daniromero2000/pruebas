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
                <li><a href="{{ route('admin.absences.index') }}">Absences</a><span class="divider"></span>
                <li class="breadactive">Crear Permiso</li>
            </ol>
        </div>
    </div>

    <div class="box crud-box"
        style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25); width: 371px !important; border-radius: 13px !important;">
        <form action="{{ route('admin.absences.store') }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                @csrf
                <h1>Crear Permiso </h1>

                <div class="form-group ">
                    <label for="start">Fecha y Hora De Inicio </label>
                    <div class="row ">
                        <div class="col-lg-12 " >
                            <div class="input-group"  id="timepicker2" data-target-input="nearest">
                                <div class="input-group-addon bg-primary">
                                    <div class="input-group-append " data-target="#timepicker2"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <input type="datetime-local" id="seg" name="start_date" id="start_date"  class="form-control datetimepicker-input"
                                    data-target="#timepicker" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <label for="city_id">Fecha y Hora de Finalización</label>
                    <div class="row ">
                        <div class="col-lg-12 " >
                            <div class="input-group"  id="timepicker1" data-target-input="nearest">
                                <div class="input-group-addon">
                                    <div class="input-group-append" data-target="#timepicker1"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <input type="datetime-local" name="finish_date" id="finish_date" class="form-control datetimepicker-input"
                                    data-target="#timepicker" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="motive_id">Motivo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                        <select class="form-control select2bs4" name="motive_id" id="motive_id"  style="width: 100%;">
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Justificación <span class="text-danger">*</span></label>
                    <div class="form-group">


                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="constancy" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Comentario <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <textarea class="form-control" rows="3" id="commentary" name="commentary" placeholder="Enter ..."></textarea>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.absences.index') }}" class="btn btn-default">Regresar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
        </form>
    </div>


</section>

@endsection
