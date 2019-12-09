<h2 class="project-title"> {{$project->name}}</h2>
<div class="row container-fluid">
    <div class="col-md-4">
        <h5 class="group-heading">Navegar</h5>
        <a href=" {{ route('admin.project.plan', [$project->id]) }}  " class="btn btn-default">Planificar </a>
    </div>
    <div class="col-md-4">
        @if($sprint)
        <h3><span class="grey">Sprint:</span> {{$sprint->name}}</h3>
        @endif
    </div>
    <div class="col-md-4 date-range">
        @if($sprint)
        @if($sprint->to_date)
            <span class="grey">Fecha Límite: </span>
        {{$sprint->to_date->diffForHumans()}}
        @endif
        @endif
    </div>
</div>