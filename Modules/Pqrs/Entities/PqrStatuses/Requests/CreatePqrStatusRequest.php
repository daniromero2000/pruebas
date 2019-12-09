<?php

namespace Modules\Pqrs\Entities\PqrStatuses\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class CreatePqrStatusRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'unique:pqr_statuses']
        ];
    }
}
