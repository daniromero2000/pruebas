{!! Form::open(['url' => 'issues/search', 'method' => 'get', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}
    <div class="form-group">
        {!! Form::text('query', null, ['class' => 'form-control', 'placeholder' => 'Buscar Tareas...']) !!}
    </div>
{!! Form::close() !!}