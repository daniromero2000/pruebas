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
                <li><a href="{{ route('admin.customer-statuses.index') }}">Estados Clientes</a><span
                        class="divider"></span>
                <li class="breadactive">Editar {{ $customerStatus->name}}</li>
            </ol>
        </div>
    </div>
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.customer-statuses.update', $customerStatus->id) }}" method="post">
            <div class="box-body">
                <h1>Editar Estado Clientes</h1>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ $customerStatus->status ?: old('name') }}" placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="color">Color <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <input class="form-control jscolor {hash:true}" type="text" name="color" id="color"
                            value="{{ $customerStatus->color ?: old('color') }}" required>
                    </div>
                </div>
            </div>

            <div class="box-footer btn-group">
                <a href="{{ route('admin.customer-statuses.index') }}" class="btn btn-default">Regresar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>

</section>
@include('layouts.admin.jscolor')
@endsection