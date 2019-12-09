<div class="row container-fluid sprint-stats-container">
    @if($project->activeSprints)
    <h5>
        <span class="grey">Sprint Activo </span>{{$project->activeSprints->name}}
    </h5>
    @if($project->activeSprints->from_date && $project->activeSprints->to_date)
    <h5 class="grey">
        <span class="grey">Desde:
        </span>{{ $project->activeSprints->from_date->format('M d, Y')}}
    </h5>
    <h5 class="grey">
        <span class="grey">Hasta:
        </span>{{ $project->activeSprints->to_date->format('M d, Y')}}
    </h5>
       @foreach($issueStatuses as $issueStatus)
    <div class="col-sm-4">
        <?php $list = Modules\Development\Entities\Utils::getIssuesInSprintByIssueStatus($issueStatus->machine_name,$project->activeSprints->id)?>
        <div data-status-heading="{{$issueStatus->machine_name}}">{{$issueStatus->label}} <br />
            <span class="grey issue-count">({{$list->count()}})</span>
        </div>
    </div>
    @endforeach
    @endif
    @endif
</div>