<?php

namespace Modules\Customers\Entities\CustomerProfessions\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateCustomerProfessionRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'professions_list_id' => ['required'],
            'customer_id'         => ['required']
        ];
    }
}
