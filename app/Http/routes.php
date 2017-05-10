<?php

use App\Property;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PropertyController@index');
Route::get('propiedad/crear', ['middleware' => 'auth', 'uses' => 'PropertyController@create']);
Route::resource('propiedad', 'PropertyController');
Route::resource('usuarios', 'UserController');


Route::post('/subscribir','PropertyController@subscribe');



Route::get('/subscriptores/{type?}/{ipp?}', ['middleware' => 'auth', 'uses' =>'PropertyController@viewSubscribers']);
Route::get('/subscriptores.csv/{type?}', ['middleware' => 'auth', 'uses' => 'PropertyController@downloadSubscribers']);

Route::get('/usuarios', ['middleware' => 'auth', 'uses' =>'UserController@index']);
//Route::post('usuarios/{u}/eliminar', ['middleware' => 'auth', 'uses' => 'UserController@remove']);



Route::post('/propiedad/consultar','PropertyController@sendContactForm');
Route::get('/propiedad/{id}/mensaje_enviado','PropertyController@showContactMessage');
Route::get('/suscripcion_enviada','PropertyController@showSuscriptionMessage');

Route::get('properties.json/{ipp?}/{where?}','PropertyController@paginate');

Route::get('propiedad/{p}/imprimir','PropertyController@printView');
Route::get('propiedad/{p}/{s}','PropertyController@show');







Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
