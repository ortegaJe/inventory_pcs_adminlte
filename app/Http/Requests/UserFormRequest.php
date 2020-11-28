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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cc' => 'required|min:10|unique:users,cc',
            'name' => 'required|unique:users,name',
            'last-name' => 'required',
            'nick-name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'campu-name' => 'required',
            'work-function' => 'required',
            'password' => 'required|min:8|confirmed',
            //'rol' => 'required'

        ];
    }

    public function message()
    {
        return [
            'cc.required' => 'Numero de identificacion es requerido.',
            'cc.min' => 'Numero de identificacion deber tener al menos 8 caracteres.',
            'cc.unique' => 'Ya existe este numero de identificacion registrado, por favor registre otro diferente.',
            'name.required' => 'Nombre del usuario es requerido',
            'name.unique' => 'Ya exite un usuario con este nombre, por favor registre otro diferente.',
            'last-name.required' => 'Apellidos del usuario es requerido',
            'nick-name.required' => 'Su nickname es requerido.',
            'email.required' => 'Su correo electrónico es requerido.',
            'email.email' => 'Correo electrónico invalido.',
            'email.unique' => 'Ya existe este correo electrónico registrado, por favor registre otro diferente.',
            'phone.unique' => 'Numero de telefono es requerido',
            'campu-name.required' => 'Debe escoger la sede del técnico',
            'work-fuction.unique' => 'Debe escoger el cargo del usuario',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'Debe contener al menos 8 caracteres la contraseña.',
            'password.confirmed' => 'Las contraseñas no coinciden.'
        ];
    }
}
