<div class="modal fade" id="editCustomer{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog text-left" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="pr-3">
                    <div class="row row-reset ">
                        <div class="col-12 ">
                            <form action="{{ route('admin.customers.update', $data->id) }}" method="post" class="form">
                                @csrf
                                @method('PUT')
                                <div class=" row">
                                    <div class="col-12 col-sm-6 mt-4 pr-0">
                                        <label for="name{{$data->id}}">Nombre <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name{{$data->id}}" validation-pattern="name"
                                            placeholder="Nombre" class="form-control"
                                            value="{!! $data->name ?: old('name')  !!}" required>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 pr-0">
                                        <label for="last_name{{$data->id}}">Apellido <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="last_name" id="last_name{{$data->id}}"
                                            validation-pattern="name" placeholder="Apellido" class="form-control"
                                            value="{!! $data->last_name ?: old('last_name')  !!}" required>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 pr-0">
                                        <label for="city_id{{$data->id}}">Ciudad de Nacimiento <span
                                                class="text-danger">*</span></label>
                                        <select name="city_id" id="city_id{{$data->id}}" class="form-control select2">
                                            @if ($cities)
                                            @foreach($cities as $city)
                                            <option @if($data->city==$city->id) selected="selected" @endif
                                                value="{{ $city->id }}">{{ $city->city }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 pr-0">
                                        <label for="scholarity_id{{$data->id}}">Escolaridad <span
                                                class="text-danger">*</span></label>
                                        <select name="scholarity_id" id="scholarity_id{{$data->id}}"
                                            class="form-control select2">
                                            @if ($scholarities)
                                            @foreach($scholarities as $scholarity)
                                            <option @if($data->scholarity==$scholarity->id) selected="selected"
                                                @endif
                                                value="{{ $scholarity->id }}">{{ $scholarity->scholarity }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 pr-0 ">
                                        <label for="customer_status_id{{$data->id}}">Estado <span
                                                class="text-danger">*</span></label>
                                        <select name="customer_status_id" id="customer_status_id{{$data->id}}"
                                            class="form-control select2">
                                            @if ($data->customerStatus)
                                            @foreach($statuses as $status)
                                            <option @if($data->customerStatus->id==$status->id) selected="selected"
                                                @endif
                                                value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-4 pr-0">
                                        <label for="customer_lead_id{{$data->id}}">Estado <span
                                                class="text-danger">*</span></label>
                                        <select name="customer_lead_id" id="customer_lead_id{{$data->id}}"
                                            class="form-control select2">
                                            @foreach($customer_leads as $customer_lead)
                                            <option @if($data->lead_id->id == $customer_lead->id ) selected="selected"
                                                @endif
                                                value="{{ $customer_lead->id }}">{{ $customer_lead->lead }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="status" id="status{{$data->id}}" class="form-control"
                                    value="1">

                                <div class="form-group mt-5 mb-0 text-right">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">Cerrar</span></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>