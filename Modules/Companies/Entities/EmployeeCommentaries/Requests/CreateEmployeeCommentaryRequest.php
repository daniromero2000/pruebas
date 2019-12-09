<?php

namespace  Modules\Companies\Entities\EmployeeCommentaries\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateEmployeeCommentaryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'employee_id' => ['required', 'bail'],
            'commentary'  => ['required', 'max:255', 'bail'],

        ];
    }
}
