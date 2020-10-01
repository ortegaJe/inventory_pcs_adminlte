<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditFormRequest extends FormRequest
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
            'cc' => 'required|numeric',
            'name' => 'required',
            'last-name' => 'nullable',
            'nick-name' => 'required',
            //'email' => 'required|email|unique',
            'phone' => 'required',
            'campus' => 'required',
            'work-function' => 'required',
            'password' => 'confirmed',
            'avatar' => 'mimes:jpg,bpm,png,svg'
        ];
    }
}
