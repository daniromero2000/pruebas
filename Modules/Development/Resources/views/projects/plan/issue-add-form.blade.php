<?php $issueTypes = Modules\Development\Entities\IssueType::pluck('label','id'); ?>

{!! Form::model($issue = new Modules\Development\Entities\Issues\Issue, ['route' => 'admin.issue.add', 'class' => 'form-inline
pull-left']) !!}

<input type="hidden" name="project_id" value="{{$project->id}}">
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['placeholder' => 'Issue', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_id', 'Type:') !!}
    {!! Form::select('type_id', $issueTypes, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Agregar Issue', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

