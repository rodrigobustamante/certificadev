<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
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

        $messages = [
            'rut.required' => 'El rut es requerido',
            'rut.max' => 'El rut es invalido',
            'rut.unique' => 'El rut ya está registrado',
            'rut.rut_chileno' => 'El rut es invalido',
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

        return Validator::make($data, [
            'rut' => 'required|max:255|unique:users|rut_chileno',
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'rut' => $data['rut'],
            'nombre' => $data['nombre'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function loginUsername()
    {
        return 'rut';
    }

    protected function getFailedLoginMessage()
    {
        return 'Las credenciales son incorrectas.';
    }
}
