<?php

namespace Modules\Customers\Entities\CustomerStatuses\Requests;

use Modules\Customers\Entities\Base\BaseFormRequest;

class CreateCustomerStatusRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'unique:customer_statuses']
        ];
    }
}
