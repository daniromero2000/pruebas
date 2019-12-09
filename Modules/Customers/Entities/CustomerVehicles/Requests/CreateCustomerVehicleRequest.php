<?php

namespace Modules\Customers\Entities\CustomerVehicles\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateCustomerVehicleRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'vehicle_type_id'  => ['required'],
            'vehicle_brand_id' => ['required']
        ];
    }
}
