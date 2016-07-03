<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestBuscar extends Request
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
            'rut' => 'required|exists:postulantes'
        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'El rut es obligatorio',
            'rut.exists' => 'No se encontró postulación con este rut'
        ];
    }

}
