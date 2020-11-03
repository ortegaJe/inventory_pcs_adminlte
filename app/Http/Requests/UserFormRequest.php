<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'cc' => 'required|max:10|unique:users,cc',
            'name' => 'required|unique:users,name',
            'last-name' => 'nullable',
            'nick-name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            //'campus' => 'required',
            //'work-function' => 'required',
            'password' => 'required|min:8|confirmed',
            'rol_id' => 'required'
        ];
    }
}
