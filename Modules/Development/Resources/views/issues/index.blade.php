@extends('development::grubber')
@extends('layouts.admin.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="globalsearch">
                        @include('development::nav.global.search')
                    </div>
                    <h2>Issues</h2>
                </div>
                <div class="panel-body">
                    <div class="row fluid-container main-content">
                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Proyecto</th>
                                        <th>Sprint</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($issues as $issue)
                                    <tr>
                                        <td><a href=" {{ route('admin.issues.show', [$issue->id])}}">{{$issue->id}}</a>
                                        </td>
                                        <td><a href="{{route('admin.issues.show', [$issue->id])}}">{{$issue->title}}</a>
                                        </td>
                                        <td>{{$issue->issueStatus->label}}</td>
                                        <td>{{$issue->issueType->label}}</td>
                                        <td>{{$issue->project->name}}</td>
                                        <td>{{$issue->sprint->name}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @include('development::errors.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection