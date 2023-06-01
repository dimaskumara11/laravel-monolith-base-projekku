<?php

namespace App\Http\Requests\Media;

use App\Helpers\ResponseHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class MediaUploadFileRequest extends FormRequest
{
    public function rules(Request $request)
    {
        if((explode("/",$request->type)[0]??"") == "image"){
            return [
                'file' => 'required|max:10000|mimes:jpg,jpeg,png,webp,svg' //10mb
            ];
        }else if((explode("/",$request->type)[0]??"") == "video"){
            return [
                'file' => 'required|max:10000|mimes:mp4,3gp' //10mb
            ];
        }else{
            return [
                'file' => 'required|max:10000|mimes:doc,docx,pdf,xls,xlsx' //10mb
            ];
        }
    }

    public function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages()??[] as $key => $value) {
            $messageError = $validator->errors()->messages()[$key][0];
        }
        throw new HttpResponseException(response()->custom((new ResponseHelper)->responseValidation(strtoupper($messageError), ["token_csrf"=>csrf_token()])));
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Name is required',
    //     ];
    // }
}
