<?php

namespace Modules\EmployeeAbsences\Entities\EmployeeAbsences\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeAbsenceRequest extends FormRequest
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
            'boss_id'     => ['required', 'bail'],
        ];
    }
}
