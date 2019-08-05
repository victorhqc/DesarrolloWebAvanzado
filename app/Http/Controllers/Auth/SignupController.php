<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class SignupController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Éste controlador se encarga del registro de usuarios, igual que su
    | validación y creación.
    |
    */

   use RedirectsUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    /**
     * Maneja la autenticación para la solicitud de registro a la aplicación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Auth::guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Crea una instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Obtiene un "validator" por cada "request" de registro.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:144'],
            'last_name' => ['required', 'string', 'max:144'],
            'email' => ['required', 'string', 'email', 'max:144', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];

        $messages = [
            'required' => ':attribute es requerido.',
            'min' => ':attribute debe tener al menos :min caracteres',
            'confirmed' => ':attribute no coincide con la confirmación.',
            'email.unique:users' => 'El correo ya se encuentra registrado',
            'password.min:8' => 'La contraseña debe tener al menos 8 caracteres',
            'password_confirmation.same:password' => 'Las contraseñas no son iguales, asegurate que sean correctas.',
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Crea una nueva instancia de usuario, después de una validación exitosa.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
