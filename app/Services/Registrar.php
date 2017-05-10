<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		
		$messages = array(
			'name.required' => 'El nombre es requerido.',
			'email.required' => 'El correo electrónico es requerido.',
			'password.required' => 'La contraseña es requerida.',
			'level.required' => 'El nivel de acceso es requerido.',
			'email.email' => 'El correo electrónico no es válido.',
			'email.unqiue' => 'Ya existe un usuario con ese correo electrónico.',
			'password.confirmed' => 'La contraseña no coincide.',
			'password.min' => 'La contraseña debe tener al menos 6 caracteres.'
		);
		
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'level' => 'required',
		],$messages);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'level' => $data['level']
		]);
	}

}
