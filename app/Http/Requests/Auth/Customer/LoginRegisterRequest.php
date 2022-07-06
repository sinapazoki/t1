<?php

namespace App\Http\Requests\Auth\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginRegisterRequest extends FormRequest
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
                'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
                'first_name' => 'required',
                'last_name' => 'required',

            ];
        



        
    }

    public function attributes()
    {

            return [
                'phone' => 'شماره موبایل',
                'first_name' => 'نام',
                'last_name' => 'نام خانوادگی',  
            ]; 
        



   }
}
