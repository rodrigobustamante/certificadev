<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistroPostulacionRequest;
use App\Http\Requests\ModificacionPostulacionRequest;
use App\Http\Requests\RequestBuscar;
use App\Postulante;
use Auth;
use Illuminate\Support\Facades\Input;

class ControllerPostulacion extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(RegistroPostulacionRequest $request)
    {
        $postulante = new Postulante;
        $postulante->rut = Input::get('rut');
        $postulante->nombre = Input::get('nombre');
        $postulante->apellido_paterno = Input::get('apellido_paterno');
        $postulante->apellido_materno = Input::get('apellido_materno');
        $postulante->fecha_nacimiento = Input::get('fecha_nacimiento');
        $postulante->sexo = Input::get('sexo');
        $postulante->telefono = Input::get('telefono');
        $postulante->email = Input::get('correo');
        $postulante->direccion = Input::get('direccion');
        $postulante->comuna = Input::get('comuna');
        $postulante->educacion = Input::get('educacion');
        $postulante->experiencia = Input::get('experiencia');
        $postulante->modalidad = Input::get('modalidad');
        $postulante->curso = Input::get('curso');
        $postulante->save();
        return redirect()->route('postulacion.index');

    }

    public function index()
    {
        if(Auth::user()->level == 0){
            $postulaciones = Postulante::all();
            return view('postulacion.listaPostulaciones')->with('postulaciones', $postulaciones);
    
        }else{
            return view('permiso');
        }
    }

    public function create()
    {
    	return view('postulacion.registroPostulacion');
    }

    public function show($id){
        if(Auth::user()->level == 0){
        	$postulacion = Postulante::where('id', $id)->get();
            return view('postulacion.find')->with('postulacion', $postulacion);
        }else{
            return view('permiso');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->level == 0){
            $postulacion = Postulante::find($id);
            return view('postulacion.edit')->with('postulacion', $postulacion);
        }else{
            return view('permiso');
        }
    }

    public function update(ModificacionPostulacionRequest $request, $id){
        $postulacion = Postulante::find($id);
        $postulacion->rut = Input::get('rut');
        $postulacion->nombre = Input::get('nombre');
        $postulacion->apellido_paterno = Input::get('apellido_paterno');
        $postulacion->apellido_materno = Input::get('apellido_materno');
        $postulacion->fecha_nacimiento = Input::get('fecha_nacimiento');
        $postulacion->sexo = Input::get('sexo');
        $postulacion->telefono = Input::get('telefono');
        $postulacion->email = Input::get('correo');
        $postulacion->direccion = Input::get('direccion');
        $postulacion->comuna = Input::get('comuna');
        $postulacion->educacion = Input::get('educacion');
        $postulacion->experiencia = Input::get('experiencia');
        $postulacion->modalidad = Input::get('modalidad');
        $postulacion->curso = Input::get('curso');
        $postulacion->estado = Input::get('estado');
        $postulacion->save();
        return redirect()->route('postulacion.index');
    }

    public function destroy($id)
    {
        $postulacion = Postulante::where('id', $id)->get()->first();
        $postulacion->delete();
        return redirect()->route('postulacion.index');
    }

    function search(RequestBuscar $request)
    {
        $rut = $request->input('rut');
        $postulacion = Postulante::where('rut', $rut)->get()->first();
        if($postulacion)
        {
            return view('postulacion.estado', ['postulacion' => $postulacion]);
        }
        else
        {
            return view('postulacion.buscar');
        }
    }

    function searchByDate(Request $request){
        
    }
}