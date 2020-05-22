<?php

namespace Modules\Customers\Entities\CustomerStatuses\Requests;

use App\Entities\Generals\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerStatusRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'status' => ['required']
        ];
    }
}
