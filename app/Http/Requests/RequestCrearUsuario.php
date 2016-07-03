<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestCrearUsuario extends Request
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
            'rut' => 'required|max:10|unique:users',
            'nombre' => 'required|max:50|alpha',
            'apellido_paterno' => 'required|max:50|alpha',
            'apellido_materno' => 'required|max:50|alpha',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages(){
        return [
            'rut.required' => 'El rut es requerido',
            'rut.max' => 'El rut es invalido',
            'rut.unique' => 'El rut ya está registrado',
            'nombre.required' => 'Campo nombre requerido',
            'nombre.max' => 'El nombre es invalido',
            'nombre.alpha' => 'El nombre es invalido',
            'apellido_paterno.required' => 'Campo apellido paterno requerido',
            'apellido_paterno.max' => 'El apellido paterno es invalido',
            'apellido_paterno.alpha' => 'El apellido paterno es invalido',
            'apellido_materno.required' => 'Campo apellido materno requerido',
            'apellido_materno.max' => 'El apellido materno es invalido',
            'apellido_materno.alpha' => 'El apellido materno es invalido',
            'password.required' => 'Contraseña necesaria',
            'password.min' => 'La contraseña debe tener como mínimo 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
            
        ];
    }
}
