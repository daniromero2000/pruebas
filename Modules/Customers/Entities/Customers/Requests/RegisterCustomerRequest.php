<?php

namespace Modules\Customers\Entities\Customers\Requests;

use App\Entities\Generals\Base\BaseFormRequest;

class RegisterCustomerRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name'                 => 'required|string|max:255',
            'password'             => 'required|string|min:8|confirmed',
            'data_politics'        => ['required'],
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
