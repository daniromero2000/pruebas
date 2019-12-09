<ul id="{{$issueStatus->machine_name}}" class="connectedSortable list-unstyled sprint-list">
    @foreach($list as $issue)
    <li class="ui-state-default" data-id="{{$issue->id}}">
        <a href=" {{ route('admin.issues.show', [$issue->id]) }}">
            <span class="issue-id">#{{$issue->id}}</span>
            <span @if($issueStatus->machine_name == 'complete') class="strikethrough" @endif>
                {{$issue->title}}
            </span>
        </a>
        @include('development::issues.issue.deadline')
        <div class="row">
            <div class="col-md-offset-6 col-md-6">
                <div class="btn-group pull-right">
                    <span
                        class="issue-type {{Modules\Development\Entities\IssueType::findOrFail($issue->type_id)->machine_name}}">
                        {{Modules\Development\Entities\IssueType::findOrFail($issue->type_id)->label}}
                    </span>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>