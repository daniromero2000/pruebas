<div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
  <div class="box-body">
    <h2><i class="fa fa-user" aria-hidden="true"></i> {{ $employee->name }} {{ $employee->last_name }} </h2>
    <table class="table table-borderless table-hover table-sm">
      <thead>
        <tr>
          <th class="text-center" scope="col">Email Usuario</th>
          <th class="text-center" scope="col">Cargo</th>
          <th class="text-center" scope="col">Sucursal</th>
          <th class="text-center" scope="col">Roles</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">{{ $employee->email }}</td>
          <td class="text-center">{{ $employee->employeePosition->position }}</td>
 @foreach ($employee->department as $department )
                 <td class="text-center">{{ $department->subsidiary->name}}</td>
           @endforeach



          <td class="text-center">
            {{ $employee->roles()->get()->implode('name', ', ') }}
          </td>
        </tr>
      </tbody>
    </table>
    <div class="row">
      <div class="col">
        <form action="{{ route('admin.employees.destroy', $employee['id']) }}" method="post" class="form-horizontal">
         @csrf
          <input type="hidden" name="_method" value="delete">
          <div class="btn-group">
            <a href="{{ route('admin.employees.edit', $employee['id']) }}" class="btn btn-primary btn-sm"><i
                class="fa fa-edit"></i> Editar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>