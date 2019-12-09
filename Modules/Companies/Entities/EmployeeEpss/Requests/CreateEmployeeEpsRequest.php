<?php

namespace Modules\Companies\Entities\EmployeeEpss\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateEmployeeEpsRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'employee_id' => ['required', 'bail'],
            'eps_id'      => ['required']
        ];
    }
}
