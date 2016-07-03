<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'sexo', 'telefono', 'email', 'direccion', 'comuna', 'educacion', 'experiencia', 'modalidad', 'curso', 'estado'];
}