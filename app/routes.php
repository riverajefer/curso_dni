<?php


Route::get('/', function()
{
	return View::make('index');
});

Route::controller('login', 'LoginController');

//Route::controller('users', 'UsersController');

Route::get('login', function()
{
	return View::make('login');
});


/************* Filtro de Autentificación ***************/
Route::filter('donde_quede', function()
{

	$id_user = Sentry::getUser()->id;
	$page_bd = User::find($id_user)->RojoPaginas->pagina_actual;

});


Route::get('hola', function()
{
	$id_user = Sentry::getUser()->id;
	$donde_estoy   = User::find($id_user)->DondeEstoy;
	$modulo = $donde_estoy->modulo;
	$pagina = $donde_estoy->pagina;
	return "Modulo ".$modulo."---Pagina: ".$pagina;

});


Route::get('logout', function()
{
	Sentry::logout();
	return Redirect::to('login');
});


Route::get('registro', function()
{
	
	Sentry::register(array(
	    'email'    => 'rivera23',
	    'password' => '123',
	    'first_name'=> 'Jefferson',
	    'last_name' => 'Rivera',
	    'activated' => true,
	));
	return "Registrado...";

});


/****************** Rojo controller ************************/

Route::get('rojo/pagina/{id}', array('before' => 'auth|acumula_rojo|terminado_rojo', 'uses' => 'RojoController@pagina'))
->where('id', '[0-9]+');



/****************** Rojo Prueba **********************/

Route::get('rojo/prueba/', function()
{
	$id_user  =  Sentry::getUser()->id;
	$RP =  RojoPaginas::whereUser_id($id_user)->update(array('terminado' => '1'));
	return "Terminado";
});



/****** Error 404 ******/
App::missing(function($exception)
{
    return Response::view('missing', array(), 404);
});
