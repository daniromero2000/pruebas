<?php

namespace Modules\Development\Entities\Projects\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateProjectRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name'     => ['required', 'bail', 'min: 3', 'max: 100', 'unique:projects'],
            'birthday' => ['sometimes', 'date'],
        ];
    }
}
