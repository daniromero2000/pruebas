@if($issue->deadline)
<div class="row">
    <div class="col-md-6 pull-right">
        <span>{{ $issue->deadline->diffForHumans()}}</span>
    </div>
</div>
@endif