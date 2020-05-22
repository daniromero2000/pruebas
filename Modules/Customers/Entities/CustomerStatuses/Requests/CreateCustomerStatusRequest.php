<?php

namespace Modules\Customers\Entities\CustomerStatuses\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateCustomerStatusRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'status' => ['required', 'unique:customer_statuses']
        ];
    }
}
