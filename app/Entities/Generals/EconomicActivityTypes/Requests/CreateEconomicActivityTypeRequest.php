<?php

namespace App\Entities\Generals\EconomicActivityTypes\Requests;

use Modules\Customers\Entities\Base\BaseFormRequest;

class CreateEconomicActivityTypeRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'economic_activity_type' => ['required', 'unique:economic_activity_types']
        ];
    }
}
