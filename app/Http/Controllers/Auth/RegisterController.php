<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::MYINSCRIPTIONS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Define las reglas de validación principales
        $validator = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Verifica si el número de documento ya existe
        $user = User::where('document_number', $data['document_number'])->first();

        if ($user) {
            // Obtiene el correo del usuario y solo muestra las primeras 3 letras y las últimas 3
            $useremail = $user->email;
            $email = substr($useremail, 0, 3) . '....' . substr($useremail, -6);
            // Agrega un mensaje de error y redirige de vuelta si el número de documento ya está registrado
            $validator->after(function ($validator) use ($data, $email) {
                $validator->errors()->add('document_number', 'El N° de documento ' . $data['document_number'] . ' ya está registrado. Si eres tú, inicia sesión con tu correo ' . $email);
            });
        }

        return $validator;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => '',
            'email' => $data['email'],
            'document_type' => $data['document_type'],
            'document_number' => $data['document_number'],
            'password' => Hash::make($data['password']),
            'status' => 'active',
            'photo' => 'default-profile.jpg',
        ])->assignRole('Participante');


    }
}
