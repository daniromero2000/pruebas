<div class="table-responsive mb-3 p-0 height-table">
    <table class="table table-head-fixed text-center table-hover table-stripped leadTable ">
        <thead class="text-center header-table">
            <tr>
                @foreach ($headers as $header)
                <th scope="col">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="body-table">
            @foreach($datas as $data)
            <tr>
                <td> {{ $data->name }} </td>
                <td> {{ $data->last_name }} </td>
                <td> {{ $data->created_at }} </td>
                <td> {{ $data->lead_id->lead }} </td>
                <td> <span class="badge"
                        style="color: #ffffff; background-color: {{ $data->status_id->color }}">{{ $data->status_id->status }}</span>
                </td>
                <td>
                    @include('layouts.newAdmin.tables.table_options', [$data, 'optionsRoutes' => $optionsRoutes])
                    <i class="fas fa-edit cursor" data-toggle="modal" data-target="#editCustomer{{$data->id}}"></i>

                    @include('layouts.newAdmin.modals.update.updateCustomer')
                </td>
            </tr>
            @endforeach
        <tbody>
    </table>

</div>