<?php

namespace Modules\EmployeeAbsences\Entities\EmployeeAbsences\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeAbsenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'commentary'   => ['required', 'bail', 'max:255'],
            'start_date'   => ['required'],
            'finish_date'  => ['required'],
            'employee_id'  => ['required', 'bail'],
            'motive_id'    => ['required', 'bail'],
        ];
    }
}
