<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmLoginRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
                return [
                    'otp' => 'required|numeric',
                    ];
    
     
    }


    public function attributes()
    {

            return [
                'otp' => 'کد تایید',
    
            ]; 
        



   }
}
