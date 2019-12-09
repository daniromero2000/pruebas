<?php

namespace Modules\Companies\Entities\Subsidiaries\Requests;

use App\Entities\Generals\Base\BaseFormRequest;
use Validator;

class CreateSubsidiaryRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name'          => ['required', 'bail', 'max:255'],
            'address'       => ['bail', 'max:255'],
            'phone'         => ['bail', 'max:255'],
            'opening_hours' => ['bail', 'max:255'],
            'city_id'       => ['required']
        ];
    }
}
