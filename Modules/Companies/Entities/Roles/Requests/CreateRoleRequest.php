<?php

namespace Modules\Companies\Entities\Roles\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateRoleRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name'         => ['required', 'max:255', 'bail', 'unique:roles'],
            'display_name' => ['required', 'max:255'],
            'description'  => ['max:255']
        ];
    }
}
