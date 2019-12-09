<?php

namespace Modules\Development\Entities\Sprints\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreateSprintStatusRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'bail', 'min: 3', 'unique: sprints'],
        ];
    }
}
