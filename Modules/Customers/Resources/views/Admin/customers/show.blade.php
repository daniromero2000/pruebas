@php
$fechaActual = strtotime(date("Y-m-d"));
$fechaMayorEdad = date("Y-m-d", strtotime("-18 years", $fechaActual));
// dd($customerId)
@endphp
@extends('customers::Admin.customers.indexCustomers')
{{-- @extends('layouts.admin.app') --}}
{{-- @section('content') --}}

@section('contentCustomer')

<section class="content">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}">Clientes</a>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.customers.index') }}">
                                {{ $customer->name}}
                                {{$customer->last_name}}</a>

                        </li>

                    </ol>
                </div>
            </div>
        </div>
    </section>
    <show-customer :customer-id="{{ $customerId}}"> </show-customer>
    @include('layouts.errors-and-messages')
    <div class="row">
        <a href="#" data-toggle="modal" data-target="#economicactivitymodal" class="btn btn-primary btn-sm"><i
                class="fa fa-edit"></i>
            Agregar Referencia</a>
    </div>
    <div class="box" style="box-shadow: 0px 2px 25px rgba(0, 0, 0, .25);">
        <ul class="nav nav-tabs" role="tablist" id="tablist">
            <li role="presentation" @if(!request()->has('info')) class="active" @endif><a href="#info"
                    aria-controls="home" role="tab" data-toggle="tab">Cliente</a></li>
            <li role="presentation" @if(request()->has('contact')) class="active" @endif><a href="#contact"
                    aria-controls="profile" role="tab" data-toggle="tab">Contacto</a></li>
            <li role="presentation" @if(request()->has('seguimiento')) class="active" @endif><a href="#seguimiento"
                    aria-controls="profile" role="tab" data-toggle="tab">Seguimiento</a></li>
        </ul>
        <div class="tab-content" id="tabcontent">
            <div role="tabpanel" class="tab-pane active" id="info">
                {{-- @include('customers::layouts.generals') --}}
                {{-- @include('customers::layouts.ids') --}}
                {{-- @include('customers::layouts.vehicles') --}}
                {{-- @include('customers::layouts.professions') --}}
                {{-- @include('customers::layouts.references') --}}
                @include('customers::layouts.economic_activities')
            </div>
            <div role="tabpanel" class="tab-pane" id="contact">
                <div class="row">
                    {{-- @include('customers::layouts.addresses')
                    @include('customers::layouts.phones')
                    @include('customers::layouts.epss')
                    @include('customers::layouts.emails') --}}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="seguimiento">
                <div class="row">
                    {{-- @include('layouts.admin.commentaries', ['datas' => $customer->customerCommentaries])
                    @include('customers::layouts.statusesLog', ['datas' => $customer->customerStatusesLog]) --}}
                </div>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('admin.customers.index') }}" class="btn btn-default btn-sm">Regresar</a>
        </div>
        {{-- @include('customers::layouts.comment_modal')
        @include('customers::layouts.add_address_modal')
        @include('customers::layouts.add_identity_modal')
        @include('customers::layouts.add_phone_modal')
        @include('customers::layouts.add_eps_modal')
        @include('customers::layouts.add_email_modal')
        @include('customers::layouts.vehicle_modal')
        @include('customers::layouts.reference_modal') --}}
        @include('customers::layouts.economic_activity_modal')
        {{-- @include('customers::layouts.add_profession_modal') --}}
    </div>
</section>
@endsection
@section('scriptsCustomer')
{{-- <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script> --}}

@endsection