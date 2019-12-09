<?php

namespace Modules\Companies\Entities\Admins\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'          => ['required', 'max:255', 'bail'],
            'last_name'     => ['required', 'max:255', 'bail'],
            'phone'         => ['max:255', 'bail'],
            'status'        => ['max:3', 'bail'],
            'email'         => ['required', 'max:255', 'email', Rule::unique('employees', 'email')->ignore($this->segment(3))]
        ];
    }
}
