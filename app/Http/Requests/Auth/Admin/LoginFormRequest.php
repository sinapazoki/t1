<?php

namespace App\Http\Requests\Auth\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'mobile' => 'required',
            'password' => 'required'
        ];
    }


    public function getCredentials()
    {
        // The form field for providing username or password
        // have name of "username", however, in order to support
        // logging users in with both (username and email)
        // we have to check if user has entered one or another
        $mobile = $this->get('mobile');

            return [
                'phone' => $mobile,
                'password' => $this->get('password')
            ];
        

        return $this->only('phone', 'password');
    }


    private function isMobile($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['mobile' => $param],
            ['mobile' => 'regex:/(09)[0-9]{9}/|digits:11|numeric']
        )->fails();
    }
}
