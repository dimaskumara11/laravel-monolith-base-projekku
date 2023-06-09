<?php

namespace App\Http\Requests\Company;

use App\Helpers\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class CompanyPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required','max:255',Rule::unique('company')->where(function ($query){
                return $query->where('name', request()->name)->whereNull('deleted_at');
            })],
            'owner_name' => 'required|max:255',
            'logo' => 'required|max:255',
            'sector_id' => 'required|exists:sector,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages()??[] as $key => $value) {
            $messageError = $validator->errors()->messages()[$key][0];
        }
        throw new HttpResponseException(redirect()->back()->withInput()->with("error",$messageError));
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Name is required',
    //     ];
    // }
}