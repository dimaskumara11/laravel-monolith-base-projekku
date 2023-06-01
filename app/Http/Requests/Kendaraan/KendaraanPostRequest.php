<?php

namespace App\Http\Requests\Kendaraan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class KendaraanPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'no_pol' => 'required',
            'status_aktif' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages()??[] as $key => $value) {
            $messageError = $validator->errors()->messages()[$key][0];
        }
        throw new HttpResponseException(redirect()->back()->withInput()->with("error",$messageError));
    }

    public function messages()
    {
        return [
            'no_pol.required' => 'No Polisi Harus Di Isi',
            'status_aktif.required' => 'Status Aktif Harus Di Isi',
        ];
    }
}