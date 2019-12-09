<div class="project-card">
    <div class="header">

            <h4>
            <a class="project-title" href="{{route('admin.projects.show', $project->id)}}">{{ $project->name }}</a>
        </h4>
        <h5>
            <span class="date date-created-at">Creado en: {{ $project->created_at->format('M d, Y h:i a')}}</span>
        </h5>
        @if($project->deadline)
        <span class="deadline">Fecha Límite: {{$project->deadline->diffForHumans()}}</span>
        @endif
    </div>
    <div class="content">
        @include('development::projects.list.active-sprint-container', [$issueStatuses])
    </div>
    <div class="row container-fluid">
        <hr />
        <div class="project-card-actions">
            <span class="small">
                <a href="  {{ route('admin.projects.edit', [$project->id])}}">Edit</a>
            </span>
        </div>
    </div>
</div>