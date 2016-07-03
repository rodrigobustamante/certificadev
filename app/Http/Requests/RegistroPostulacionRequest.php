<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroPostulacionRequest extends Request
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

        Validator::extend('rut_chileno',
            function ($attribute, $value, $parameters, $validator){
                if(strpos($value,"-")==false){
                    $RUT[0] = substr($value, 0, -1);
                    $RUT[1] = substr($value, -1);
                }else{
                    $RUT = explode("-", trim($value));
                }
                $elRut = str_replace(".", "", trim($RUT[0]));
                $factor = 2;
                $suma = 0;
                for($i = strlen($elRut)-1; $i >= 0; $i--):
                    $factor = $factor > 7 ? 2 : $factor;
                    $suma += $elRut{$i}*$factor++;
                endfor;
                $resto = $suma % 11;
                $dv = 11 - $resto;
                if($dv == 11){
                    $dv=0;
                }else if($dv == 10){
                    $dv="k";
                }else{
                    $dv=$dv;
                }
               if($dv == trim(strtolower($RUT[1]))){
                   return true;
               }else{
                   return false;
               }
            });

        return [
            'rut' => 'required|between:9,10|unique:postulantes|rut_chileno',
            'nombre' => 'required|min:3|alpha',
            'apellido_paterno' => 'required|min:3|',
            'apellido_materno' => 'required|min:3|alpha',
            'fecha_nacimiento' => 'required|before:tomorrow',
            'sexo' => 'required',
            'telefono' => 'required|size:9',
            'correo' => 'email|required',
            'direccion' => 'required|between:5,50',
            'comuna' => 'required',
            'educacion' => 'required',
            'experiencia' => 'required|min:0',
            'modalidad' => 'required',
            'curso' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'El rut es obligatorio',
            'rut.between' => 'El rut es invalido',
            'rut.unique' => 'El rut ya está registrado',
            'rut.rut_chileno' => 'El rut es invalido',
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre debe tener como mínimo 3 letras',
            'nombre.alpha' => 'El nombre es invalido',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio',
            'apellido_paterno.min' => 'El apellido debe tener como mínimo 3 letras',
            'apellido_paterno.alpha' => 'El nombre es invalido',
            'apellido_materno.required' => 'El apellido materno es obligatorio',
            'apellido_materno.min' => 'El apellido debe tener como mínimo 3 letras',
            'apellido_materno.alpha' => 'El nombre es invalido',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'fecha_nacimiento.before' => 'Fecha invalida',
            'sexo.required' => 'Campo sexo obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.size' => 'El teléfono debe tener 9 digitos',
            'correo.email' => 'El correo es invalido',
            'correo.required' => 'El correo es obligatorio',
            'direccion.required' => 'La dirección es obligatoria',
            'direccion.between' => 'La dirección es invalida',
            'experiencia.required' => 'La experiencia es obligatoria',
            'experiencia.min' => 'La experiencia no puede ser negativa',
        ];
    }
}