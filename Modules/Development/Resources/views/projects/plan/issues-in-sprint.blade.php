<ul id="{{$sprint->machine_name}}" class="connectedSortable list-unstyled sprint-list">
    @foreach(Modules\Development\Entities\Projects\Project::find($project->id)->getIssuesFromSprint($sprint->id) as
    $issue)
    <li class="ui-state-default" data-id="{{$issue->id}}">
        <a href=" {{ route('admin.issues.show', [$issue->id])}}">
            <span class="issue-id">#{{$issue->id}}</span>
            <span
                class="@if(Modules\Development\Entities\IssueStatuses\IssueStatus::find($issue->status_id)->label  == 'Complete') strikethrough @endif">
                {{$issue->title}}
            </span>
        </a>
        <div class="row issue-actions-attributes">
            <div class="col-md-4 issue-actions">
                <div class="btn-group pull-left">
                    <button class="btn btn-default">
                        <a href=" {{ Route('admin.issues.edit', [$issue->id])}}">Editar</a>
                    </button>
                    <button type="button" class="btn btn-default archive-issue">Archivar</button>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="btn-group pull-right">
                    @if($issue->deadline)
                    <span class="issue-deadline">
                        <span>
                            {{ $issue->deadline->diffForHumans()}}
                        </span>
                    </span>
                    @endif
                    <span
                        class="issue-type {{Modules\Development\Entities\IssueType::findOrFail($issue->type_id)->machine_name}}">
                        {{Modules\Development\Entities\IssueType::findOrFail($issue->type_id)->label}}
                    </span>
                    <span
                        class="issue-status {{Modules\Development\Entities\IssueStatuses\IssueStatus::findOrFail($issue->status_id)->machine_name}}">
                        {{Modules\Development\Entities\IssueStatuses\IssueStatus::findOrFail($issue->status_id)->label}}
                    </span>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>