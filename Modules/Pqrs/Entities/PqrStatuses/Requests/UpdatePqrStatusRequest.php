<?php

namespace Modules\Pqrs\Entities\PqrStatuses\Requests;

use App\Entities\Generals\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class UpdatePqrStatusRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required']
        ];
    }
}
