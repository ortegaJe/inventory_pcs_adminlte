<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineFormRequest extends FormRequest
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
     *      'serial' => 'required|unique:machines,serial',
     *      'ip' => 'required|ipv4|max:15|unique:machines,ip_range',
     *      'mac' => 'required|max:17|unique:machines,mac_address',
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'serial' => 'required',
            'ramslot00' => 'required',
            'hard-drive' => 'required',
            'cpu' => 'required',
            'ip' => 'required|ipv4|max:15',
            'mac' => 'required|max:17',
            'campus_id' => 'required',
            'location' => 'required|max:20'
        ];
    }
}
