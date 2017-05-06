<?php

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
Route::get('rutero', 'PdfController@invoice');
Route::get('ingresados', 'Pdf_R_IController@invoice');
Route::get('referidosporasesor', 'Pdf_R_I_TController@contarreferidos');
Route::filter('auth', function($route, $request)
{
	if (!Auth::check()) return Redirect::to('login');
});


Route::filter('noAuth', function($route, $request)
{
	if (Auth::check()) return Redirect::to('inicio');
});


Route::filter('permiso', function($route, $request)
{
	$user=Auth::user();
	$acceso= $user->rol->permisos->where('permiso',$route->getActionName());
   // dd($route);
	if($acceso->count()<=0){
		return 'No tienes acceso.';
	}
});




Route::group(['before' => 'noAuth'], function()
{
	
});
	Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');

Route::group(['before' => 'auth'], function()
{
	Route::get('logout', 'AuthController@getLogout');
});


Route::group(['before' => 'auth|permiso'], function()
{

	Route::get('/', ['as'=>'inicio', 'uses' => 'InicioController@getInicio']);

	Route::get('inicio', ['as'=>'inicio', 'uses' => 'InicioController@getInicio']);

	// Route::get('referido', ['as'=>'referido.index', 'uses' => 'ReferidoController@index']);
	// Route::get('referido/{referido}/edit', ['as'=>'referido.edit', 'uses' => 'ReferidoController@edit']);
	// Route::patch('referido/{referido}', ['as'=>'referido.update', 'uses' => 'ReferidoController@update']);

	Route::resource('usuario', 'UsuarioController');
	 Route::resource('referido', 'ReferidoController');
	Route::resource('pregunta', 'PreguntaController');
	Route::resource('encuesta', 'EncuestaController');
	Route::get('sincronizar', 'UsuarioController@getSincronizar');

});
