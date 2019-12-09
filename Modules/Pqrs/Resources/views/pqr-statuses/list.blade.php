@extends('layouts.admin.app')
@section('content')

<section class="content">
    @include('layouts.errors-and-messages')
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.dashboard') }}"> <i class="fa fa-home"></i> Dashboard</a><span
                        class="divider"></span>
                </li>
                <li><a href="{{ route('admin.customer-statuses.index') }}">Estados Pqrs</a><span class="divider"></span>

            </ol>
        </div>
    </div>

    @if($pqrStatuses)
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <div class="box-body">
            <h1>{{$pqrStatuses->count()}} Estados PQRS</h1>
            <div class="row">
                <div class="col-md-5">
                    @include('layouts.search', ['route' => route('admin.pqr-statuses.index')])
                </div>
                <div class="col-md-5 float-right">
                    @include('layouts.admin.trashed-list', ['route' => route('admin.pqr-statuses.index')])
                </div>
            </div>
            @include('layouts.admin.tables.tables_customer_status', [$headers, 'datas' => $pqrStatuses])
        </div>

    </div>

    @endif

</section>

@endsection