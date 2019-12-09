<?php

namespace App\Entities\Generals\EconomicActivityTypes\Requests;

use Modules\Customers\Entities\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdateEconomicActivityTypeRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'economic_activity_type' => ['required']
        ];
    }
}
