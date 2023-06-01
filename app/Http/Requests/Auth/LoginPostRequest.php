<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages()??[] as $key => $value) {
            $messageError = $validator->errors()->messages()[$key][0];
        }
        throw new HttpResponseException(redirect()->back()->with("error",$messageError));
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Name is required',
    //     ];
    // }
}