<?php

namespace Modules\Pqrs\Entities\Pqrs\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreatePqrRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name'  => ['required'],
            'email' => ['required', 'email'],
        ];
    }
}
