@extends('layouts.admin.app')
@section('content')

<section class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span class="divider"></span>
                </li>
                <li><a href="{{ route('admin.employees.index') }}">Empleados</a><span class="divider"></span>
                <li class="breadactive">Crear Empleado</li>
            </ol>
        </div>
    </div>
    <div class="box crud-box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <form action="{{ route('admin.employees.store') }}" method="post" class="form">
            <div class="box-body">
                @csrf
                <h1>Crear Empleado</h1>
                <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <input type="text" name="name" id="name" validation-pattern="name" placeholder="Nombre"
                            class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name">Apellido <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-check"></i>
                        </div>
                        <input type="text" name="last_name" id="last_name" validation-pattern="name"
                            placeholder="Apellido" class="form-control" value="{{ old('last_name') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email Usuario <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" name="email" id="email" validation-pattern="email" placeholder="Email"
                            class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div id="employee_position_id" class="form-group">
                    <label for="department_id">Cargo <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <select name="employee_position_id" id="employee_position_id" class="form-control" enabled>
                            @foreach($employee_positions as $employee_position)
                            <option value="{{ $employee_position->id }}">{{ $employee_position->position }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="department_id" class="form-group">
                    <label for="department_id">Departamento <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-building"></i>
                        </div>
                        <select name="department_id" id="department_id" class="form-control" enabled>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control"
                            required>
                    </div>
                </div>
                <label for="password">Rol <span class="text-danger">*</span></label>
                <ul class="list-unstyled list-inline">
                    @foreach($roles as $role)
                    <li>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" @if(isset($selectedIds) && in_array($role->id,
                                $selectedIds))checked="checked" @endif
                                name="role" id="role"
                                value="{{ $role->id }}">
                                {{ $role->display_name }}
                            </label>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="box-footer">
                <div class="btn-group">
                    <div class="btn-group">
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-default">Regresar</a>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
