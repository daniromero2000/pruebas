<?php

namespace Modules\Customers\Entities\CustomerStatuses\Requests;

use Modules\Customers\Entities\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerStatusRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'unique:customer_statuses']
        ];
    }
}
