{!! Form::model($sprint = new Modules\Development\Entities\Sprint, ['route' => 'admin.sprint.add', 'class' => 'form-inline pull-left']) !!}
<div class="form-group">
    {!! Form::text('name', null, ['placeholder' => 'Nombre Sprint', 'class' => 'form-control']) !!}
    <input name="project_id" type="hidden" value="{{$project->id}}">
</div>
<div class="form-group">
    {!! Form::submit('Agregar Sprint', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}