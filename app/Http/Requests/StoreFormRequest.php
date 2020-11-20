<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
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
     *      
     *      
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'serial' => 'required|unique:machines,serial|string',
            'ramslot00' => 'required',
            'ramslot01' => 'required',
            'hard-drive' => 'required',
            'cpu' => 'required',
            'ip' => 'required|ipv4|max:15|unique:machines,ip_range',
            'mac' => 'required|max:17|unique:machines,mac_address',
            'campus' => 'required',
            'location' => 'required|max:200'
        ];
    }
}
