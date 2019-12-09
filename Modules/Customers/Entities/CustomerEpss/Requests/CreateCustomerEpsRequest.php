<?php

namespace Modules\Customers\Entities\CustomerEpss\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateCustomerEpsRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'customer_id' => ['required', 'bail'],
            'eps_id'      => ['required']
        ];
    }
}
